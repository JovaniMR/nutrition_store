@extends('layouts.app')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header " data-parallax="true" style="background-image: url('/img/banner4.jpg'); max-height:450px">
</div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-2">
                    <h1>Orden de compra</h1>
                    <hr class="w-50">
                </div>
            </div>
            <div class="row">
                {{-- Form client --}}
                <div class="col-7">
                    <div class="mb-4">
                        <h3>Paso 1: Información del envio <span class="material-icons"
                                style="vertical-align: middle">local_shipping</span></h3>
                    </div>
                    <div class="card">
                        <div class="card-body mt-3">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="name" class="form-control" 
                                            placeholder="Nombre completo" value="{{ auth()->user()->name }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Email" value="{{ auth()->user()->email }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Dirección</label>
                                    <input type="text" name="address" class="form-control" id="inputAddress"
                                        placeholder="1234 Main St" required>
                                </div>
                                <div class="form-row justify-content-around">
                                    <div class="form-group col-md-3">
                                        <input type="text" name="city" class="form-control" placeholder="Ciudad" required> 
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" name="state" class="form-control" placeholder="Estado" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" name="zip" class="form-control" placeholder="Código postal" required>
                                        </div>
                                </div>
                                <div class="form-row justify-content-around" >

                                    <div class="form-group col-md-5">
                                        <input type="text" name="phone" class="form-control" placeholder="Teléfono" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection