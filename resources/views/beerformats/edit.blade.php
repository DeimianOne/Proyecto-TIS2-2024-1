@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Editar Formato de Cerveza</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('beerformats.update', $beerformat->id) }}">
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
                    <label for="container">Contenedor</label>
                    <input type="text" class="form-control" id="container" name="container" placeholder="Nombre del formato" value="{{ old('container', $beerformat->container) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="liters">Cantidad litros</label>
                    <input type="number" class="form-control" id="liters" name="liters" placeholder="litros del formato" value="{{ old('liters', $beerformat->liters) }}">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
