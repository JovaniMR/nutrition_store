@extends('layouts.app')

@section('body-class','landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/gym.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="title mb-5">Arnold Schwarzenegger</h1>
                <h2>
                    <blockquote class="blockquote text-justify">El culturismo es como cualquier otro deporte. Para tener
                        éxito, debes dedicarte 100% a tu entrenamiento, dieta y enfoque mental.
                    </blockquote>
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised mb-5">
    <div class="container">
        <div class="section text-center">
            <img src="{{ asset('/img/BANNER.jpg') }}" class="img-fluid" alt="banner" alt="banner">
            {{-- Products --}}
            <div class="features mb-5">
                <div class="row text-center">
                    <div class="col">
                        <h2 class="title">Resultados de la búsqueda</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product )
                    <div class="col-md-3 mt-5 transition">
                        <div class=" mr-5" style="width: 16rem;">
                            {{-- <img src="https://via.placeholder.com/200" class="card-img-top" style="height: 200px" alt="..."> --}}
                            <img src="{{ asset($product->featured_image_url) }}" class="card-img-top" style="height: 200px; " alt="{{ $product->name }}">
                            <div class="card-body ">
                              <p class="card-title text" style="font-size:1rem">{{ $product->name }}</p>
                              {{-- <p class="card-text text-justify">Some quick example text to build on the card title </p> --}}
                              <p class="card-text ">Contenido: {{ $product->number_content }} {{ $product->weight_unit_content }} </p>
                              <p class="card-text ">Sabor: {{ $product->flavor }} </p>
                              <p class="card-text"><strong class="text-danger" style="font-size:1.3rem">${{ $product->price }}</strong> </p>
                              <a href="{{ url('products/'.$product->id) }}" class="btn btn-success btn-sm btn-block">Ver Producto</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- End Products --}}
        </div>
    </div>
</div>
@endsection