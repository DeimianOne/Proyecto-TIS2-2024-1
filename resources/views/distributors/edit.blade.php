@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Editar footer</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('ldgfooters.update', $ldgfooter->id) }}">
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
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la compañía de cerveza" value="{{ old('name', $distributor->name) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Dirección" value="{{ old('address', $distributor->address) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="address_number">Número dirección</label>
                    <input type="number" class="form-control" id="address_number" name="address_number" placeholder="Número dirección" value="{{ old('address_number', $distributor->address_number) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="phone_number">Teléfono</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Número de teléfono" value="{{ old('phone_number', $distributor->phone_number) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email del distribuidor" value="{{ old('email', $distributor->email) }}">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            </form>
        </div>
    </div>
</div>

<!-- SweetAlert2 Script -->
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Good job!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        });
    </script>
@endif

<!-- Select2 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        theme:"classic"
    });
});
</script>
@endsection
