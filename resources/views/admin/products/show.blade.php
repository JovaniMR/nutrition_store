@extends('layouts.app')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header " data-parallax="true" style="background-image: url('/img/banner2.jpg'); max-height:450px">
</div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            {{-- Product --}}
            <div class="row mb-5">
                <div class="col">
                    <div class=" mb-3">
                        <div class="row g-0">
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
                                                            <img class="d-block w-100" src="{{ asset($imageFeatured) }}"
                                                                alt="slide">
                                                        </div>
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
                                    <h2 class="card-title mb-4">{{ $product->name }}</h2>
                                    <p class="card-text text-justify mb-4">{{$product->long_description}}</p>
                                    <p class="card-text ">Contenido: {{ $product->number_content }}
                                        {{ $product->weight_unit_content }} </p>
                                    <p class="card-text mb-4">Sabor: {{ $product->flavor }} </p>
                                    <p class="card-text ">
                                        <strong class="text-danger" style="font-size:2.3rem">$
                                            {{ $product->price }}</strong>
                                        <span class="text-muted">IVA incluido.</span>
                                    </p>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        <div class="row mt-5">
                                            @csrf
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <p>Cantidad:</p>
                                                    <select class="form-control " name="quantity"
                                                        id="exampleFormControlSelect1">
                                                        <option value="0" selected>Selecciona la cantidad</option>
                                                        @for ( $i=1 ; $i <= $product->stock ; $i++)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            @auth
                                            <div class="col-7 mt-4">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="btn btn-success btn-block"><i
                                                        class="material-icons">add_shopping_cart</i> Agregar al
                                                    carrito</button>
                                            </div>

                                            @else
                                            <div class="col-7 mt-4">
                                                <a href="{{ route('login') }}" class="btn btn-success btn-block"><i
                                                        class="material-icons">add_shopping_cart</i> Agregar al
                                                    carrito</a>
                                            </div>
                                            @endauth
                                            <span class="text-muted mt-4 ">
                                                <i class="material-icons icon icon-info">info</i>
                                                Registrate GRATIS e inicia sesión, para agregar al carrito y comprar. </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <span class="text-muted ml-5 mt-4" style="font-size:.7rem">
                                EL CONSUMO DE ESTE PRODUCTO ES RESPONSABILIDAD DE QUIEN LO RECOMIENDA Y DE QUIEN LO USA.
                                ESTE PRODUCTO NO ES UN MEDICAMENTO.</span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End product --}}

            {{-- Banner --}}
            <div class="row text-center">
                <div class="col">
                    <img src="{{ asset('/img/banner3.jpg') }}" class="img-fluid" alt="banner">
                </div>
            </div>
            {{-- End banner --}}

            {{-- Recommended products --}}
            <div class="row mt-4">
                <div class="col">
                    <!--         carousel  -->
                    <div class="container">
                        <div class="row text-center">
                            <div class="col">
                                <h2 class="title">Productos recomendados</h2>
                                <hr class="w-50">
                                <!-- Carousel Card -->
                                <div class=" card-raised card-carousel">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                                        data-interval="4000">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row justify-content-center">
                                                    @foreach ($productsRecomendedOne as $productRecomended)
                                                    <div class="col-md-3 mt-5 mb-5">
                                                        <div class=" mr-5" style="width: 16rem;">
                                                            {{-- <img src="https://via.placeholder.com/200" class="card-img-top" style="height: 200px" alt="..."> --}}
                                                            <img src="{{ asset($productRecomended->featured_image_url) }}"
                                                                class="card-img-top" style="height: 200px; " alt="...">
                                                            <div class="card-body ">
                                                                <p class="card-title text" style="font-size:1rem">
                                                                    {{ $productRecomended->name }}</p>
                                                                {{-- <p class="card-text text-justify">Some quick example text to build on the card title </p> --}}
                                                                <p class="card-text ">Contenido:
                                                                    {{ $productRecomended->number_content }}
                                                                    {{ $productRecomended->weight_unit_content }} </p>
                                                                <p class="card-text ">Sabor:
                                                                    {{ $productRecomended->flavor }} </p>
                                                                <p class="card-text"><strong class="text-danger"
                                                                        style="font-size:1.3rem">$
                                                                        {{ $productRecomended->price }}</strong> </p>
                                                                <a href="{{ url('/products/'.$productRecomended->id) }}"
                                                                    class="btn btn-success btn-sm btn-block">Ver
                                                                    Producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="carousel-item ">
                                                <div class="row justify-content-center">
                                                    @foreach ($productsRecomendedTwo as $productRecomended)
                                                    <div class="col-md-3 mt-5 mb-5">
                                                        <div class=" mr-5" style="width: 16rem;">
                                                            {{-- <img src="https://via.placeholder.com/200" class="card-img-top" style="height: 200px" alt="..."> --}}
                                                            <img src="{{ asset($productRecomended->featured_image_url) }}"
                                                                class="card-img-top" style="height: 200px; " alt="...">
                                                            <div class="card-body ">
                                                                <p class="card-title text" style="font-size:1rem">
                                                                    {{ $productRecomended->name }}</p>
                                                                {{-- <p class="card-text text-justify">Some quick example text to build on the card title </p> --}}
                                                                <p class="card-text ">Contenido:
                                                                    {{ $productRecomended->number_content }}
                                                                    {{ $productRecomended->weight_unit_content }} </p>
                                                                <p class="card-text ">Sabor:
                                                                    {{ $productRecomended->flavor }} </p>
                                                                <p class="card-text"><strong class="text-danger"
                                                                        style="font-size:1.3rem">$
                                                                        {{ $productRecomended->price }}</strong> </p>
                                                                <a href="{{ url('/products/'.$productRecomended->id) }}"
                                                                    class="btn btn-success btn-sm btn-block">Ver
                                                                    Producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                            data-slide="prev">
                                            <div class="icon icon-danger">
                                                <i class="material-icons">keyboard_arrow_left</i>
                                            </div>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                            data-slide="next">
                                            <div class="icon icon-danger">
                                                <i class="material-icons icon-info">keyboard_arrow_right</i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Carousel Card -->
                            </div>

                        </div>
                        {{-- End ecommended products --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection