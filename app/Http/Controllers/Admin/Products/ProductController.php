<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use SweetAlert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation

        $messages = [
            'name.required' => 'El nombre del producto es obligatorio',
            'description.required' => 'La descripción es obligatoria',
            'long_description.required' => 'La descripción larga es obligatoria',
            'number_content.required' => 'La cantidad es obligatoria',
            'number_content.between' => 'La cantidad debe ser entre 0 y 50',
            'weight_unit_content.required' => 'La medida de peso es obligatoria',
            'weight_unit_content.alpha' => 'La medida de peso deben de ser caracteres',
            'flavor.required' => 'El sabor es obligatorio',
            'flavor.alpha' => 'El sabor debe de ser caracteres',
            'price.required' => 'El precio es obligatorio',
            'price.numeric' => 'El precio debe de ser numerico'
        ];

        $rules = [
           'name' => 'required',
           'description' => 'required',
           'long_description' => 'required',
           'number_content' => 'required|numeric|between:0,50',
           'weight_unit_content' => 'required|alpha',
           'flavor' => 'required|alpha',
           'price' => 'required|numeric|between:0,10000'
        ];

        $this->validate($request,$rules,$messages);
      
        //Save product
        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->long_description = $request->long_description;
        $product->number_content = $request->number_content;
        $product->weight_unit_content = $request->weight_unit_content;
        $product->flavor = $request->flavor;
        $product->price = $request->price;
        $product->category_id = 1;

        $product->save();

        alert()->success('Producto registrado');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $images = $product->images;
        return view('admin.products.show',compact('product','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::find($id); 

        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Validation

        $messages = [
            'name.required' => 'El nombre del producto es obligatorio',
            'name.alpha' => 'El nombre del producto debe ser alfabetico',
            'description.required' => 'La descripción es obligatoria',
            'long_description.required' => 'La descripción larga es obligatoria',
            'long_description.max' => 'La descripción larga debe tener al menos 250 caracteres',
            'number_content.required' => 'La cantidad es obligatoria',
            'number_content.between' => 'La cantidad debe ser más de 0',
            'weight_unit_content.required' => 'La medida de peso es obligatoria',
            'weight_unit_content.alpha' => 'La medida de peso deben de ser caracteres',
            'flavor.required' => 'El sabor es obligatorio',
            'flavor.alpha' => 'El sabor debe de ser caracteres',
            'price.required' => 'El precio es obligatorio',
            'price.numeric' => 'El precio debe de ser numerico'
        ];

        $rules = [
           'name' => 'required|alpha',
           'description' => 'required',
           'long_description' => 'required|max:250',
           'number_content' => 'required|numeric|between:0,50',
           'weight_unit_content' => 'required|alpha',
           'flavor' => 'required|alpha',
           'price' => 'required|numeric|between:0,10000'
        ];

        $this->validate($request,$rules,$messages);
      
        
        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->long_description = $request->long_description;
        $product->number_content = $request->number_content;
        $product->weight_unit_content = $request->weight_unit_content;
        $product->flavor = $request->flavor;
        $product->price = $request->price;
        $product->category_id = 1;

        $product->save();

        alert()->success('Producto modificado');
        return redirect('/admin/products');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        alert()->success('Producto eliminado');
        return redirect()->back();
      
    }
}
