@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Editar evento</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('events.update', $event->id) }}">
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
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre evento" value="{{ old('name', $event->name) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="start_date_time">Fecha inicio</label>
                    <input type="datetime-local" class="form-control" id="start_date_time" name="start_date_time" placeholder="2024-06-01T10:00" value="{{ old('start_date_time', $event->start_date_time) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="end_date_time">Fecha término</label>
                    <input type="datetime-local" class="form-control" id="end_date_time" name="end_date_time" placeholder="2024-06-01T12:00" value="{{ old('end_date_time', $event->end_date_time) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="location_latitude">Latitud</label>
                    <input type="number" step="any" class="form-control" id="location_latitude" name="location_latitude" placeholder="-34.603722" value="{{ old('location_latitude', $event->location_latitude) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="location_longitude">Longitud</label>
                    <input type="number" step="any" class="form-control" id="location_longitude" name="location_longitude" placeholder="-58.381592" value="{{ old('location_longitude', $event->location_longitude) }}">
                </div>

                <div class="form-group">
                    <label for="company_id">Compañías</label>
                    <select name="company_id[]" id="company_id" class="form-control" multiple>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ in_array($company->id, old('company_id', $event->companies->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
