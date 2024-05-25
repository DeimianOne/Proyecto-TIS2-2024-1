@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Crear Nuevo Formato</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ route ('format.store') }}" >
                @csrf
                <div class="form-group">
                    <label for="container">Contenedor</label>
                    <input type="text" class="form-control" id="container" name="container" placeholder="Nombre del formato">
                </div>
                <div class="form-group">
                    <label for="liters">Cantidad litros</label>
                    <input type="number" class="form-control" id="liters" name="liters" placeholder="litros del formato">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
