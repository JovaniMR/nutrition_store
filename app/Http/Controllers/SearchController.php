<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show(Request $request){
        
        $name = $request->search;
        $products = Product::where('name','like',"%$name%")->get(); 
    
        return view('search.home',compact('products'));
    }
}
