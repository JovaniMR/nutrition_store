<?php

namespace App\Http\Controllers\Admin\Products;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;

class ProductImageController extends Controller
{
    public function index($id){

        $product = Product::find($id);
        $images = $product->images()->orderBy('featured','desc')->get();
          
        return view('admin.products.images.index',compact('product','images'));
    }

    public function create(){

        return view('admin.products.images.create');
    }

    public function store(Request $request, $id){
         
        $file = $request->file('photo');
        $filePath = 'img/products';
        $fileName = uniqid().$file->getClientOriginalName();
        $moved = $file->move($filePath,$fileName);

        if($moved){
            $productImage = new ProductImage();
            $productImage->image = $filePath.'/'.$fileName;
            $productImage->product_id = $id;
    
            $productImage->save();
    
            alert()->success('Imágen agregada');
            return redirect()->back();
        }
    }

    public function destroy(Request $request, $id){
    
        $image = ProductImage::find($request->image_id);

        $deleted = File::delete($image->image);

        if($deleted){
           $image->delete(); 
        }

        alert()->success('Imágen borrada');
        return redirect()->back();
    }

    public function select($id,$image){

        ProductImage::where('product_id',$id)->update([
            'featured' => false
        ]);

        $image = ProductImage::find($image);
        $image->featured = true;

        $image->save();

        return back();
        
    }
}
