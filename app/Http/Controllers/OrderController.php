<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::orderBy('id','desc')->get();

        return view('admin.orders.index',compact('orders'));
    }

    public function show($id){
        $order = Order::find($id);
        $products = Order::find($id)->products;

        return view('admin.orders.show',compact('products','order'));
    } 

    public function update(Request $request, $id){
        $order = Order::find($id);

        $order->status_shipment = $request->shipment_status;
        $order->save();

        return back();  
    }
}
