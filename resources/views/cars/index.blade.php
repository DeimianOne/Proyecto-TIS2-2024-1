@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-body table-responsive">
                <h2>Listado de los vehiculos</h2>
                <a href="{{ route('cars.create') }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> Agregar</a>
                <table class="table table-sm table-light table-hover pt-2 responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>
                                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary btn-sm my-1"><i class="fa fa-edit"></i> Editar</a>
                                        <form action="{{ route('cars.destroy', $car->id) }}" class="confirmacion-eliminacion" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm my-1">
                                                <i class="fa fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection