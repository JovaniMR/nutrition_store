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
                                                            <img class="d-block w-100"
                                                                src="{{ asset('/img/proteina.jpg') }}"
                                                                alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100"
                                                                src="{{ asset('/img/proteina.jpg') }}"
                                                                alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100"
                                                                src="{{ asset('/img/proteina.jpg') }}"
                                                                alt="Third slide">
                                                        </div>
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
                                    <h2 class="card-title mb-4">Whey protein isolate </h2>
                                    <p class="card-text text-justify mb-4">This is a wider card with supporting text below as
                                        a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text ">Contenido: 5 lbs </p>
                                    <p class="card-text mb-4">Sabor: Chocolate </p>
                                    <p class="card-text ">
                                        <strong class="text-danger" style="font-size:2.3rem">$
                                            1,200</strong> 
                                            <span class="text-muted">IVA incluido.</span>
                                    </p>
                                    <div class="row mt-5">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <p >Cantidad</p>
                                                <select class="form-control " id="exampleFormControlSelect1">
                                                    <option selected>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-7 mt-4">
                                            <a href="#" class="btn btn-success btn-block"><i
                                                    class="material-icons">shopping_cart</i> Agregar al carrito</a>
                                        </div>
                                        <span class="text-muted mt-4 ">
                                                <i class="material-icons icon icon-info" >info</i>                                          
                                            Registrate GRATIS o Inicia Sesión, para comprar. </span>
                                    </div>

                                </div>
                            </div>
                            <span class="text-muted ml-5 mt-4" style="font-size:.7rem">
                                EL CONSUMO DE ESTE PRODUCTO ES RESPONSABILIDAD DE QUIEN LO RECOMIENDA Y DE QUIEN LO USA. ESTE PRODUCTO NO ES UN MEDICAMENTO.</span>
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
                                <h2>Productos recomendados</h2>
                                <hr class="w-50">
                                <!-- Carousel Card -->
                                <div class=" card-raised card-carousel">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                                        data-interval="4000">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-3 mt-5 mb-5">
                                                        <div class=" mr-5" style="width: 16rem;">
                                                            {{-- <img src="https://via.placeholder.com/200" class="card-img-top" style="height: 200px" alt="..."> --}}
                                                            <img src="{{ asset('/img/proteina.jpg') }}"
                                                                class="card-img-top" style="height: 200px; " alt="...">
                                                            <div class="card-body ">
                                                                <p class="card-title text" style="font-size:1rem">Whey
                                                                    protein isolate</p>
                                                                {{-- <p class="card-text text-justify">Some quick example text to build on the card title </p> --}}
                                                                <p class="card-text ">Contenido: 5 lbs </p>
                                                                <p class="card-text ">Sabor: Chocolate </p>
                                                                <p class="card-text"><strong class="text-danger"
                                                                        style="font-size:1.3rem">$ 1,200</strong> </p>
                                                                <a href="#" class="btn btn-success btn-sm btn-block">Ver
                                                                    Producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-5 mb-5">
                                                        <div class=" mr-5" style="width: 16rem;">
                                                            {{-- <img src="https://via.placeholder.com/200" class="card-img-top" style="height: 200px" alt="..."> --}}
                                                            <img src="{{ asset('/img/proteina.jpg') }}"
                                                                class="card-img-top" style="height: 200px; " alt="...">
                                                            <div class="card-body ">
                                                                <p class="card-title text" style="font-size:1rem">Whey
                                                                    protein isolate</p>
                                                                {{-- <p class="card-text text-justify">Some quick example text to build on the card title </p> --}}
                                                                <p class="card-text ">Contenido: 5 lbs </p>
                                                                <p class="card-text ">Sabor: Chocolate </p>
                                                                <p class="card-text"><strong class="text-danger"
                                                                        style="font-size:1.3rem">$ 1,200</strong> </p>
                                                                <a href="#" class="btn btn-success btn-sm btn-block">Ver
                                                                    Producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-5 mb-5">
                                                        <div class=" mr-5" style="width: 16rem;">
                                                            {{-- <img src="https://via.placeholder.com/200" class="card-img-top" style="height: 200px" alt="..."> --}}
                                                            <img src="{{ asset('/img/proteina.jpg') }}"
                                                                class="card-img-top" style="height: 200px; " alt="...">
                                                            <div class="card-body ">
                                                                <p class="card-title text" style="font-size:1rem">Whey
                                                                    protein isolate</p>
                                                                {{-- <p class="card-text text-justify">Some quick example text to build on the card title </p> --}}
                                                                <p class="card-text ">Contenido: 5 lbs </p>
                                                                <p class="card-text ">Sabor: Chocolate </p>
                                                                <p class="card-text"><strong class="text-danger"
                                                                        style="font-size:1.3rem">$ 1,200</strong> </p>
                                                                <a href="#" class="btn btn-success btn-sm btn-block">Ver
                                                                    Producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item ">
                                                <div class="row justify-content-center">

                                                    <div class="col-md-3 mt-5 mb-5 ">
                                                        <div class=" mr-5" style="width: 16rem;">
                                                            {{-- <img src="https://via.placeholder.com/200" class="card-img-top" style="height: 200px" alt="..."> --}}
                                                            <img src="{{ asset('/img/proteina.jpg') }}"
                                                                class="card-img-top" style="height: 200px; " alt="...">
                                                            <div class="card-body ">
                                                                <p class="card-title text" style="font-size:1rem">Whey
                                                                    protein isolate</p>
                                                                {{-- <p class="card-text text-justify">Some quick example text to build on the card title </p> --}}
                                                                <p class="card-text ">Contenido: 5 lbs </p>
                                                                <p class="card-text ">Sabor: Chocolate </p>
                                                                <p class="card-text"><strong class="text-danger"
                                                                        style="font-size:1.3rem">$ 1,200</strong> </p>
                                                                <a href="#" class="btn btn-success btn-sm btn-block">Ver
                                                                    Producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-5 mb-5 ">
                                                        <div class=" mr-5" style="width: 16rem;">
                                                            {{-- <img src="https://via.placeholder.com/200" class="card-img-top" style="height: 200px" alt="..."> --}}
                                                            <img src="{{ asset('/img/proteina.jpg') }}"
                                                                class="card-img-top" style="height: 200px; " alt="...">
                                                            <div class="card-body ">
                                                                <p class="card-title text" style="font-size:1rem">Whey
                                                                    protein isolate</p>
                                                                {{-- <p class="card-text text-justify">Some quick example text to build on the card title </p> --}}
                                                                <p class="card-text ">Contenido: 5 lbs </p>
                                                                <p class="card-text ">Sabor: Chocolate </p>
                                                                <p class="card-text"><strong class="text-danger"
                                                                        style="font-size:1.3rem">$ 1,200</strong> </p>
                                                                <a href="#" class="btn btn-success btn-sm btn-block">Ver
                                                                    Producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-5 mb-5 ">
                                                        <div class=" mr-5" style="width: 16rem;">
                                                            {{-- <img src="https://via.placeholder.com/200" class="card-img-top" style="height: 200px" alt="..."> --}}
                                                            <img src="{{ asset('/img/proteina.jpg') }}"
                                                                class="card-img-top" style="height: 200px; " alt="...">
                                                            <div class="card-body ">
                                                                <p class="card-title text" style="font-size:1rem">Whey
                                                                    protein isolate</p>
                                                                {{-- <p class="card-text text-justify">Some quick example text to build on the card title </p> --}}
                                                                <p class="card-text ">Contenido: 5 lbs </p>
                                                                <p class="card-text ">Sabor: Chocolate </p>
                                                                <p class="card-text"><strong class="text-danger"
                                                                        style="font-size:1.3rem">$ 1,200</strong> </p>
                                                                <a href="#" class="btn btn-success btn-sm btn-block">Ver
                                                                    Producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
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