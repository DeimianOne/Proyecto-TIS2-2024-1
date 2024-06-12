@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default ">
        <h3 class="block-title">Editar Producto</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div class="col-lg-8">

        @dump($errors)

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label" for="product-type">Tipo de Producto:</label>
                <select name="product-type" id="product-type" required>
                    <option value="">Selecciona un tipo</option>
                    <option value="beer" {{ $product->beer ? 'selected' : '' }}>Cerveza</option>
                    <option value="merchandise" {{ $product->merchandise ? 'selected' : '' }}>Merchandise</option>
                </select>
            </div>

            <div class="mb-2 form-group">
                <label class="form-label" for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Nombre del producto">
            </div>

            <div class="mb-2 form-group">
                <label class="form-label" for="description">Descripción</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}" placeholder="Descripción del producto">
            </div>

            <div class="mb-2 form-group value-group" style="{{ $product->beer ? 'display:none;' : '' }}">
                <label class="form-label" for="value">Valor</label>
                <input type="text" class="form-control" id="value" name="value" value="{{ $product->value }}" placeholder="Valor del producto">
            </div>

            @if($product->beer)
            <div class="beer-fields mb-2 form-group">
                <label class="form-label" for="liter-value">Valor por litro</label>
                <input type="text" class="form-control" id="liter-value" name="liter-value" value="{{ $product->beer->liter_value }}" placeholder="Valor por litro de la cerveza">
            </div>

            <div class="beer-fields mb-2 form-group">
                <label class="form-label" for="beer-style">Estilo de la cerveza</label>
                <input type="text" class="form-control" id="beer-style" name="beer-style" value="{{ $product->beer->beerstyle->id }}" placeholder="Estilo de la cerveza">
            </div>

            <div class="beer-fields mb-2 form-group">
                <label class="form-label" for="beer-format">Formato</label>
                <input type="text" class="form-control" id="beer-format" name="beer-format" value="{{ $product->beer->beerformats->pluck('id')->implode(', ') }}" placeholder="Formato de la cerveza">
            </div>
            @endif

            <div class="mb-2 form-group">
                <label class="form-label" for="image">Imagen</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ $product->image }}" placeholder="URL de la imagen del producto">
            </div>

            <div class="mb-3 form-group">
                <label class="form-label" for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" placeholder="Cantidad en stock">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
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

        // Llamar a la función de toggleFields para mostrar los campos correctos al cargar la página
        toggleFields();

        // Añadir el listener de cambio al select
        productTypeSelect.change(toggleFields);
    });
</script>
@endsection
