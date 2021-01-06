@extends('layouts.app')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header " data-parallax="true" style="background-image: url('/img/banner4.jpg'); max-height:450px">
</div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div>
                <h2 class="text-center pt-5 mb-5">EDITAR PRODUCTO</h2>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                  </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>        
            @endif
            <form action="{{ url('admin/products/'.$product->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="Nombre" name="name"
                                    value="{{ old('name', $product->name) }}">
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" placeholder="Descripción corta" name="description" value="{{ old('description', $product->description) }}">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <textarea class="form-control text-justify" placeholder="Descripción larga"
                                    name="long_description" rows="2">
                                    {{ old('long_description',$product->long_description) }}
                                </textarea>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-3">
                                <input type="number" class="form-control" placeholder="Cantidad" name="number_content" value="{{ old('number_content',$product->number_content) }}">
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="Medida de peso"
                                    name="weight_unit_content" aria-describedby="help" value="{{ old('weight_unit_content',$product->weight_unit_content) }}">
                                <small id="help">Ejemplo: gr,lbs,kg</small>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="Sabor" name="flavor"  value="{{ old('flavor',$product->flavor) }}">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="Precio" name="price"
                                    aria-describedat="help1" value="{{ old('price', $product->price) }}">
                                <small id="help1">Ejemplo: 1400.00, 1550.50</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5 pb-5">
                    <div class="col-4">
                        <button type="submit" class="btn btn-success btn-block ">Modificar producto</button>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('products.index') }}" class="btn btn-danger btn-block ">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection