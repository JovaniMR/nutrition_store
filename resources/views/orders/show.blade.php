@extends('layouts.app')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header " data-parallax="true" style="background-image: url('/img/banner4.jpg'); max-height:450px">
</div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container pb-5">
            <div class="row">
                <h2><strong> Pedido #{{ $order->id }}</strong></h2>
            </div>
            {{-- Products of order --}}
            <div class="row">
                <div class="col-6">
                    @foreach ($products as $product)
                    {{-- Product --}}
                    <div class="card">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <!--         carousel  -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <!-- Carousel Card -->
                                            <div class=" card-raised card-carousel">
                                                <div id="carouselExampleIndicators" class="carousel slide"
                                                    data-ride="carousel" data-interval="4000">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100"
                                                                src="{{ asset($product->FeaturedImageUrl) }}"
                                                                alt="slide">
                                                        </div>
                                                        @php
                                                        $images = $product->images()->where('featured',false)->get();
                                                        @endphp
                                                        @foreach ( $images as $image )
                                                        <div class="carousel-item ">
                                                            <img class="d-block w-100" src="{{ asset($image->image) }}"
                                                                alt="slide">
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                        role="button" data-slide="prev">
                                                        <div class="icon icon-danger">
                                                            <i class="material-icons">keyboard_arrow_left</i>
                                                        </div>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                        role="button" data-slide="next">
                                                        <div class="icon icon-danger">
                                                            <i class="material-icons icon-info">keyboard_arrow_right</i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Carousel Card -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end carousel -->
                            </div>
                            <div class="col-md-6">
                                <div class="card-body ">
                                    <h3 class="card-title mb-4">{{ $product->name }}</h3>
                                    <p class="card-text ">Contenido: {{ $product->number_content }}
                                        {{ $product->weight_unit_content }} </p>
                                    <p class="card-text">Sabor: {{ $product->flavor }} </p>
                                    <p class="card-text mb-4">Cantidad: {{ $product->pivot_quantity }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End product --}}
                    @endforeach
                </div>
                {{-- Card address shipment --}}
                <div class="col-5 ml-auto">
                    <div class="card pt-3">
                        <div class="text-center">
                            <h3>Dirección de envio <span class="material-icons icon icon-success"
                                    style="vertical-align: middle">location_on</span></h3>
                        </div>
                        <div class="text-center">
                            <hr class="w-50">
                        </div>
                        <div class="card-body">
                            <p>{{ $order->address }}, {{ $order->city }} ({{ $order->zip }}). {{ $order->state }} </p>
                            <p>Recibe <strong>{{ auth()->user()->name }}</strong></p>
                            <p>Correo: <strong>{{ auth()->user()->email }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection