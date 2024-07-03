@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default ">
        <h3 class="block-title">Crear Nuevo Producto</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div class="col-lg-8">

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="product-type">Tipo de Producto:</label>
                    <select name="product-type" id="product-type" required>
                        <option value="">Selecciona un tipo</option>
                        <option value="beer">Cerveza</option>
                        <option value="merchandise">Merchandise</option>
                    </select>
                </div>

                <div class="mb-2 form-group">
                    <label class="form-label" for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto"
                        required>
                </div>

                <div class="mb-2 form-group">
                    <label class="form-label" for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description"
                        placeholder="Descripción del producto" required></textarea>
                </div>

                <div class="beer-fields mb-2 form-group" style="display: none;">
                    <label class="form-label" for="liter-value">Valor por litro</label>
                    <input type="text" class="form-control" id="liter-value" name="liter-value"
                        placeholder="Valor por litro de la cerveza">
                </div>

                <div class="beer-fields mb-2 form-group" style="display: none;">
                    <label class="form-label" for="beer-style">Estilo de la cerveza</label>
                    <select class="form-control" id="beer-style" name="beer-style">
                        @foreach($beerstyles as $beerstyle)
                        <option value="{{ $beerstyle->id }}">{{ $beerstyle->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="beer-fields mb-2 form-group" style="display: none;">
                    <label class="form-label" for="beer-format">Formato</label>
                    <select class="form-control" id="beer-format" name="beer-format">
                        @foreach($beerformats as $beerformat)
                        <option value="{{ $beerformat->id }}">{{ $beerformat->container }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2 form-group">
                    <label class="image" for="image">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image"
                        placeholder="URL de la imagen del producto">
                </div>

                <div class="mb-3 form-group">
                    <label class="form-label" for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Cantidad en stock"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

        </div>
    </div>
</div>
@endsection

@section('js_after')
<script>
$(document).ready(function() {
    var productTypeSelect = $('#product-type');
    var beerFields = $('.beer-fields');
    var merchandiseFields = $('.merchandise-fields');
    var productValueField = $('.value-group');

    function toggleFields() {
        var selectedType = productTypeSelect.val();

        // Ocultar todos los campos con deslizamiento
        beerFields.slideUp();
        merchandiseFields.slideUp();
        productValueField.slideDown();

        // Mostrar campos específicos según el tipo de producto seleccionado
        if (selectedType === 'beer') {
            beerFields.slideDown();
            productValueField.slideUp();
        } else if (selectedType === 'merchandise') {
            merchandiseFields.slideDown();
        }
    }

    // Añadir el listener de cambio al select
    productTypeSelect.change(toggleFields);
});
</script>
@endsection