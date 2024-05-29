@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Crear Nuevo Producto</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('products.update' , $product->id) }}">
                @csrf
                @method('PUT') 

                <!-- Error Display Section -->
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group mb-4">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="{{ old('name', $product->name) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="description">Descripción</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="descripción del producto" value="{{ old('description', $product->description) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="value">Valor</label>
                    <input type="number" class="form-control" id="value" name="value" placeholder="Valor del producto" value="{{ old('value', $product->value) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="image">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Imagen del producto" value="{{ old('image', $product->image) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock del producto" value="{{ old('stock', $product->stock) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="visualizations">Visualizaciones</label>
                    <input type="number" class="form-control" id="visualizations" name="visualizations" placeholder="Visualizacion del producto" value="{{ old('visualizations', $product->visualizations) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="visibility">Visibilidad</label>
                    <input type="number" class="form-control" id="visibility" name="visibility" placeholder="Visibilidad del producto" value="{{ old('visibility', $product->visibility) }}">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection