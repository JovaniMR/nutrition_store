@extends('layouts.app')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header " data-parallax="true" style="background-image: url('/img/banner4.jpg'); max-height:450px">
</div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container pb-5">
            {{-- success message payment --}}
            @if (session('status'))
            <div class="row pt-5">
                <div class="col-12">
                    <div class="alert alert-success">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            {{-- Orders --}}
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center mb-5 " colspan="6">
                            <h1>Mis pedidos</h1>
                            <hr class="w-50">
                        </th>
                    </tr>
                </thead>
                @if ($orders->count())
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No.pedido</th>
                        <th class="text-center" scope="col">Fecha - Hora </th>
                        <th class="text-center" scope="col">Estatus del envio</th>
                        <th class="text-center" scope="col"></th>
                        <th class="text-center" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td class="align-middle text-center">{{ $order->id }}</td>
                        <td class="align-middle text-center">{{ $order->created_at }} </td>
                        <td class="align-middle text-center">{{ $order->status_shipment }}</td>
                        @if ($order->status_shipment == 'Pendiente')
                        <td class="align-middle text-center">
                            @for ($i = 0 ; $i < 3 ; $i++) <i class="material-icons icon icon-secondary">
                                wifi_tethering</i>
                                @endfor
                        </td>
                        @endif
                        @if ($order->status_shipment == 'En preparación')
                        <td class="align-middle text-center">
                            @for ($i = 0 ; $i < 3 ; $i++) <i class="material-icons icon icon-warning">compare_arrows</i>
                                @endfor
                        </td>
                        @endif
                        @if ($order->status_shipment == 'Enviado')
                        <td class="align-middle text-center">
                            @for ($i = 0 ; $i < 3 ; $i++) <i class="material-icons icon icon-success">
                                keyboard_arrow_right</i>
                                @endfor <i class="material-icons icon icon-success">local_shipping</i>
                                @for ($i = 0 ; $i < 3 ; $i++) <i class="material-icons icon icon-success">
                                    keyboard_arrow_right</i>
                                    @endfor
                        </td>
                        @endif
                        <td class="align-middle text-center">
                            {{-- Button show products of order --}}
                            <a data-toggle="tooltip" data-placement="top" title="Ver detalles del pedido"
                                data-container="body" href="{{ url('/orders/'.$order->id) }}">
                                <span class="material-icons icon icon-info">visibility</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                <tbody>
                    <tr>
                        <td colspan="5">
                            <h3> <i class="material-icons icon icon-info p-2" style="vertical-align: middle">info</i>Aún
                                no haz realizado ningún pedido</h3>
                        </td>
                    </tr>
                </tbody>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection