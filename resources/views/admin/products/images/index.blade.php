@extends('layouts.app')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="page-header " data-parallax="true" style="background-image: url('/img/banner4.jpg'); max-height:450px">
</div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            {{-- Products list --}}
            <div class="text-center pt-5 mb-4">
                <h2>ADMINISTRACIÓN DE IMAGENES</h2>
            </div>
            {{-- Add image button  --}}

            <div class="row ml-3 mr-3">
                <button class="btn btn-primary" data-toggle="modal" data-target="#productRegister"><i
                        class="material-icons pt-2">add</i> Agregar imágen</button>

                <a href="{{ route('products.index') }}" class="btn btn-default ml-auto">Regresar</a>
            </div>

            {{-- End Add image button --}}
            <div class="text-center mb-2">
                <h2>{{ $product->name }}</h2>
            </div>
            {{-- Images --}}
            <div class="row mb-5">
                @foreach ( $images as $image )
                <div class="col-md-3">
                    <div class="card-body">
                        <img class="img-fluid rounded" src=" {{ asset($image->image) }}" alt="{{ $image->image }}">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-19">
                                <form action="" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                                    <button class="btn btn-danger btn-sm btn-block d-inline " type="submit">Borrar <i
                                            class="material-icons icon icon-light"
                                            style="padding-top:7px">delete</i></button>
                                </form>
                            </div>
                            <div class="col-3 ml-auto">
                                @if($image->featured == 1)
                                <button type="button" class="btn btn-success btn-sm btn-fab btn-round d-inline"
                                    data-toggle="tooltip" data-placement="top" title="Imágen destacada actualmente"
                                    data-container="body">
                                    <i class="material-icons">favorite</i>
                                </button>
                                @else
                                <a class="btn btn-warning btn-sm btn-fab btn-round "
                                    href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}">
                                    <i class="material-icons">favorite</i>
                                </a>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Product Create Modal --}}
@include('admin.products.images.create')