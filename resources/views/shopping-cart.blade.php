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
                        <th class="text-center mb-5 pb-5" colspan="5">
                            <h1>Mi carrito</h1>
                        </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th class="text-center" scope="col">Cantidad</th>
                        <th class="text-center" scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="text-center" scope="row">
                            <img src="{{ asset('/img/proteina.jpg') }}" class="img-fluid" alt=""
                                style="max-width: 170px">
                        </th>
                        <td class="align-middle">
                            <h3><strong>Whey protein isolate</strong> </h3>
                            <p>Contenido: 5 lbs </p>
                            <p>Sabor: Chocolate </p>
                        </td>
                        <td class="align-middle">$1,220</td>

                        <td class="align-middle text-center">
                            <span class="btn btn-info btn-sm">
                                <i class="material-icons">remove</i>
                            </span>
                            <span class="ml-3 mr-3">1</span>
                            <span class="align-middle btn btn-info btn-sm">
                                <i class="material-icons">add</i>
                            </span>
                        </td>
                        <td class="align-middle text-center">$1,220</td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">
                            <img src="{{ asset('/img/proteina.jpg') }}" class="img-fluid" alt=""
                                style="max-width: 170px">
                        </th>
                        <td class="align-middle">
                            <h3><strong>Whey protein isolate</strong> </h3>
                            <p>Contenido: 5 lbs </p>
                            <p>Sabor: Chocolate </p>
                        </td>
                        <td class="align-middle">$1,220</td>

                        <td class="align-middle text-center">
                            <span class="btn btn-info btn-sm">
                                <i class="material-icons">remove</i>
                            </span>
                            <span class="ml-3 mr-3">1</span>
                            <span class="align-middle btn btn-info btn-sm">
                                <i class="material-icons">add</i>
                            </span>
                        </td>
                        <td class="align-middle text-center">$1,220</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="align-middle text-center">
                            <h2>
                                <strong>Subtotal</strong>
                            </h2>
                        </td>
                        <td class="align-middle text-center">
                            <h3>$1,200</h3>
                        </td>
                    </tr>
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
                            <h3>$1,200</h3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            @auth
                            <a class="btn btn-success btn-block mt-5 mb-5" href="#">Continuar con mi compra</a>
                            @else
                            <a class="btn btn-success btn-block mt-5 mb-5" href="{{ route('login') }}">Continuar con mi compra</a>
                            @endauth
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- End shopping-cart products --}}

        </div>
    </div>
</div>
@endsection