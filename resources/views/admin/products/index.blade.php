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
                <h2>ADMINISTRACIÓN DE PRODUCTOS</h2>
            </div>
            {{-- Add product button  --}}
            <div class="mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#productRegister"><i
                        class="material-icons pt-2">add</i> Agregar producto</button>
            </div>
            {{-- End Add product button --}}
            {{-- Products list --}}
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Producto</th>
                        <th class="text-center" scope="col">Descripción</th>
                        <th class="text-center" scope="col">Precio</th>
                        <th class="text-center" scope="col">Cant. en inventario</th>
                        <th class="text-center" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product )
                    <tr>
                        <th class="text-center align-middle" scope="row">
                            <img src="{{ asset($product->featured_image_url) }}" class="img-fluid rounded" alt=""
                                style="max-width: 100px">
                        </th>
                        <td class="align-middle">
                            <h5><strong>{{ $product->name }}</strong> </h5>
                            <p>Contenido: {{ $product->number_content }} {{ $product->weight_unit_content }} </p>
                            <p>Sabor: {{ $product->flavor }} </p>
                        </td>
                        <td class="align-middle text-justify" style="max-width:350px">
                            <p>{{ $product->long_description }}</p>
                        </td>
                        <td class="align-middle text-center">$ {{ $product->price }}</td>
                        <td class="align-middle text-center">{{ $product->stock }}</td>

                        {{-- Actions --}}
                        <td class="align-middle text-center">

                            <a data-toggle="tooltip" data-placement="top" title="Ver producto" data-container="body"
                                href="#">
                                <span class="material-icons icon icon-info">visibility</span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Editar producto" data-container="body"
                                href="{{ url('admin/products/'.$product->id.'/edit') }}">
                                <span class="material-icons icon icon-warning">edit</span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Gestionar imágenes"
                                data-container="body" href="{{ url('admin/products/'.$product->id.'/images') }}">
                                <span class="material-icons icon icon-success">image</span>
                            </a>
                            {{-- Button delete action --}}
                            <form id="delete-form" class="d-inline" action="{{ url('admin/products/'.$product->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}

                                <button data-toggle="tooltip" data-placement="top" title="Eliminar producto"
                                    data-container="body" style="border:none; background:none" type="submit"><span
                                        class="material-icons icon icon-danger" style="vertical-align: middle">delete</span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- End products list--}}
            {{-- Pagination --}}
            <div class="pagination pagination-success justify-content-center mt-5 mb-5">
                {{ $products->links() }}
            </div>
            {{-- End pagination --}}
        </div>
    </div>
</div>
@endsection

{{-- Product Create Modal --}}
@include('admin.products.create')