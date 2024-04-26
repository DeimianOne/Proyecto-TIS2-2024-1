@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('cars.store') }}" method="POST" class="card p-3">
            @csrf

            <h2 class="mb-3">Agregar un auto</h2>

            <div class="mb-3">
                <label for="model" class="form-label">Modelo:</label>
                <input type="text" name="model" id="model" class="form-control @error('model') is-invalid @enderror" value="{{ old('model') }}" required autofocus>
                @error('model')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="brand" class="form-label">Marca:</label>
                <input type="text" name="brand" id="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand') }}" required>
                @error('brand')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Crear auto</button>
        </form>
    </div>
@endsection