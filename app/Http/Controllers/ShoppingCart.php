<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class ShoppingCart extends Controller
{

    public function index()
    {
        $userId = auth()->user()->id; // or any string represents user identifier
        $products = Cart::session($userId)->getContent();

        return view('shopping-cart', compact('products'));
    }

    // add cart items to a specific user
    public function add(Request $request)
    {
        if($request->quantity == 0){
            alert()->error('Elige la cantidad de productos');
        }else{
            $product = Product::find($request->product_id);

            // add cart items to a specific user
            $userId = auth()->user()->id; // or any string represents user identifier
            Cart::session($userId)->add(array(
                'id' => $product->id, // inique row ID
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'flavor' => $product->flavor,
                    'content' => $product->number_content.' '.$product->weight_unit_content,
                    'image' => $product->featured_image_url
                ),
                'associatedModel' => $product,
            ));
    
            alert()->success('Producto agregado al carrito');
        }

        return back();
    }

    // removing cart item for a specific user's cart
    public function delete($product_id)
    {
        // removing cart item for a specific user's cart
        $userId = auth()->user()->id; // or any string represents user identifier
        Cart::session($userId)->remove($product_id);

        alert()->success('Producto eliminado del carrito');
        return back();
    }

    // you may also want to update a product's quantity
    public function addOne($product_id)
    {
        $userId = auth()->user()->id;

        Cart::session($userId)->update($product_id, array(
            'quantity' => 1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));

        return back();
    }

    // you may also want to update a product by reducing its quantity, you do this like so:
    public function removeOne(Request $request)
    {
        $userId = auth()->user()->id;

        Cart::session($userId)->update($request->product_id, array(
            'quantity' => -1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
        ));

        return back();
    }
}
