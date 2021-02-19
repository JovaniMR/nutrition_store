@extends('layouts.app')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header " data-parallax="true" style="background-image: url('/img/banner4.jpg'); max-height:450px">
</div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            {{-- Shopping-cart products --}}
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center mb-5 " colspan="6">
                            <h1>Mi carrito</h1>
                            <hr class="w-50">
                        </th>
                    </tr>
                </thead>
                @if (Cart::getContent()->count())
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th class="text-center" scope="col">Cantidad</th>
                        <th class="text-center" scope="col">Subtotal</th>
                        <th class="text-center" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <th class="text-center" scope="row">
                            <img src="{{ asset($product->attributes->image) }}" class="img-fluid" alt="image"
                                style="max-width: 170px">
                        </th>
                        <td class="align-middle">
                            <h3><strong>{{ $product->name }}</strong> </h3>
                            <p>Contenido: {{ $product->attributes->content }} </p>
                            <p>Sabor: {{ $product->attributes->flavor}} </p>
                        </td>
                        <td class="align-middle">$ {{ $product->price }}</td>

                        <td class="align-middle text-center">
                            {{-- Button remove one quantity --}}
                            <form id="delete-form" class="d-inline" action="{{ url('cart-removeOne/'.$product->id) }}"
                                method="POST">
                                @csrf
                                <button class="align-middle" data-toggle="tooltip" data-placement="top" title="Quitar 1"
                                    data-container="body" style="border:none; background:none" type="submit"><span
                                        class="material-icons icon icon-info">remove</span></button>
                            </form>
                            <span class="ml-3 mr-3">{{ $product->quantity }}</span>
                            {{-- Button add one quantity --}}
                            <form id="delete-form" class="d-inline" action="{{ url('cart-addOne/'.$product->id) }}"
                                method="POST">
                                @csrf
                                <button class="align-middle" data-toggle="tooltip" data-placement="top" title="Añadir 1"
                                    data-container="body" style="border:none; background:none" type="submit"><span
                                        class="material-icons icon icon-info">add</span></button>
                            </form>
                        </td>
                        <td class="align-middle text-center">$ {{ $product->price * $product->quantity }}</td>
                        <td class="align-middle text-center">
                            {{-- Button delete pruduct of cart --}}

                            {{-- Button delete action --}}
                            <form id="delete-form" class="d-inline" action="{{ url('cart-delete/'.$product->id) }}"
                                method="POST">
                                @csrf
                                {{ method_field('DELETE') }}

                                <button data-toggle="tooltip" data-placement="top" title="Eliminar producto"
                                    data-container="body" style="border:none; background:none" type="submit"><span
                                        class="material-icons icon icon-danger">clear</span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="align-middle text-center">
                            <h2>
                                <strong> Total</strong>
                            </h2>
                        </td>
                        <td class="align-middle text-center">
                            <h3>$ {{ Cart::getSubTotal() }}</h3>
                        </td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    <tr>
                        <td colspan="5">
                            <h3> <i class="material-icons icon icon-info p-2">info</i>Tu carrito esta vacío</h3>
                        </td>
                    </tr>
                </tbody>
                @endif
            </table>
            {{-- Error message payment --}}
            @if (session('status'))
            <div class="alert alert-danger">
                <div class="container">
                    <div class="alert-icon">
                        <i class="material-icons">error_outline</i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                    </button>
                    {{ session('status') }}
                </div>
            </div>    
            @endif
            {{-- End shopping-cart products --}}
            <div class="row justify-content-center pb-4">
                <div class="col-8 text-center">
                    <img class="img-fluid text-center" style="width: 110px" src="{{ asset('/img/secure_pay.jpg ') }}"
                        alt="secure pay">
                    <img class="img-fluid" src="{{ asset('/img/paypal.png ') }}" alt="paypal">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-7">
                    @auth
                    @if (Cart::getContent()->count())
                    <button class="btn btn-success btn-block mb-5" data-toggle="modal"
                        data-target="#payment">Continuar con mi compra </button>
                    @else
                    <a class="btn btn-success btn-block mb-5 disabled" href="#">Continuar con mi compra </a>
                    @endif
                    @else
                    <a class="btn btn-success btn-block mb-5" href="{{ route('login') }}">Continuar con mi
                        compra </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Modal order and payment --}}

@include('payment')