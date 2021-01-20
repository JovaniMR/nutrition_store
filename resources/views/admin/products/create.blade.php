<!-- Classic Modal -->
<div class="modal fade" id="productRegister" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Nuevo producto</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                </button>
                                @foreach ($errors->all() as $error )
                                <ul>
                                    <li>{{ $error }}</li>
                                </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row mt-4">
                        <div class="col-5">
                            <input type="text" class="form-control" placeholder="Nombre" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" placeholder="Descripción corta" name="description"
                                value="{{ old('description') }}">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <textarea class="form-control" rows="3" placeholder="Descripción larga"
                                name="long_description">{{ old('long_description') }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3">
                            <input type="number" class="form-control" placeholder="Contenido" name="number_content"
                                value="{{ old('number_content') }}">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Medida de peso"
                                name="weight_unit_content" aria-describedby="help"
                                value="{{ old('weight_unit_content') }}">
                            <small id="help"><strong>Ejemplo:</strong> gr, lbs, kg, oz</small>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control" placeholder="Sabor" name="flavor"
                                value="{{ old('flavor') }}">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-5">
                            <input type="text" class="form-control" placeholder="Precio" name="price"
                                aria-describedat="help1" value="{{ old('price') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control" placeholder="Cantidad en inventario" name="stock"
                                aria-describedat="help1" value="{{ old('stock') }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success ">Guardar producto</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--  End Modal -->