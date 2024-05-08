@extends('layouts.app') <!-- O la ruta correcta de tu layout -->

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Crear Nueva Cerveza</h3>
    </div>
    <div class="block-content block-content-full">
        <form action="{{ route('guardar.cerveza') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la cerveza">
            </div>
            <div class="form-group">
                <label for="estilo">Estilo de cerveza</label>
                <input type="text" class="form-control" id="estilo" name="estilo" placeholder="Estilo de la cerveza">
            </div>
            <div class="form-group">
                <label for="formato">Formato</label>
                <input type="text" class="form-control" id="formato" name="formato" placeholder="Formato de la cerveza">
            </div>
            <div class="form-group">
                <label for="valor_litro">Valor por litro</label>
                <input type="text" class="form-control" id="valor_litro" name="valor_litro" placeholder="Valor por litro de la cerveza">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="text" class="form-control" id="imagen" name="imagen" placeholder="URL de la imagen de la cerveza">
            </div>
            <div class="form-group">
                <label for="vistas">Vistas</label>
                <input type="number" class="form-control" id="vistas" name="vistas" placeholder="Número de vistas">
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Cantidad en stock">
            </div>
            <div class="form-group">
                <label for="tipo_producto">Tipo de producto</label>
                <input type="text" class="form-control" id="tipo_producto" name="tipo_producto" placeholder="Tipo de producto">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection