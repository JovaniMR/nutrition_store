<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    public function payWithPayPal(Request $request)
    {
        $total = $request->total;
        //////////////
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($total);
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        // $transaction->setDescription('See your IQ results');

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {

        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/cart')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            //Save details order
            return $this->saveOrder($result);
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/cart')->with(compact('status'));
    }

    //Save details order
    public function saveOrder($result)
    {
        $userId = auth()->user()->id;

        //address info
        $line1 = $result->getPayer()->getPayerInfo()->getShippingAddress()->getLine1();
        $line2 = $result->getPayer()->getPayerInfo()->getShippingAddress()->getLine2();
        $address = $line1 . ' ' . $line2;
        $city = $result->getPayer()->getPayerInfo()->getShippingAddress()->getCity();
        $state = $result->getPayer()->getPayerInfo()->getShippingAddress()->getState();
        $zip = $result->getPayer()->getPayerInfo()->getShippingAddress()->getPostalCode();

        $order = new Order();

        $order->user_id = $userId;
        $order->status_shipment = 'Pendiente';
        $order->address = $address;
        $order->city = $city;
        $order->state = $state;
        $order->zip = $zip;

        $order->save();

        //Save table pivot
        $orders = Order::all();
        $orderId = $orders->last()->id;

        foreach (Cart::session($userId)->getContent() as $product) {

            $productPivot = Product::find($product->id);

            $productPivot->orders()->attach($orderId,['quantity'=>$product->quantity]);
        }

        //Delete product stock

        foreach (Cart::session($userId)->getContent() as $product) {

            $prod = Product::find($product->id);
            $stock = $prod->stock - $product->quantity;
            $prod->stock = $stock;

            $prod->save();
        }

        //delete cart
        Cart::session($userId)->clear();

        $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
        return redirect('/orders')->with(compact('status'));
    }
}
