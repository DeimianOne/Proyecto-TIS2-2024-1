@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Editar Datos sección footer</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div class="col-lg-8">
            @if (isset($footerData))
            <form method="POST" action="{{ route('ldgfooters.update', $footerData->id) }}">
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

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" class="form-control" value="{{ $footerData->address }}">
                </div>
                <div class="form-group">
                    <label for="address_number">Número de Dirección</label>
                    <input type="number" name="address_number" class="form-control" value="{{ $footerData->address_number }}">
                </div>
                <div class="form-group">
                    <label for="phone_number">Número de Teléfono</label>
                    <input type="tel" name="phone_number" class="form-control" value="{{ $footerData->phone_number }}">
                </div>
                <div class="form-group">
                    <label for="business_email">Correo Electrónico del Negocio</label>
                    <input type="email" name="business_email" class="form-control" value="{{ $footerData->business_email }}">
                </div>
                <div class="form-group">
                    <label for="contact_email">Correo Electrónico de Contacto</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ $footerData->contact_email }}">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="url" name="facebook" class="form-control" value="{{ $footerData->facebook }}">
                </div>
                <div class="form-group">
                    <label for="x">X</label>
                    <input type="url" name="x" class="form-control" value="{{ $footerData->x }}">
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="url" name="instagram" class="form-control" value="{{ $footerData->instagram }}">
                </div>
                <div class="form-group">
                    <label for="tiktok">TikTok</label>
                    <input type="url" name="tiktok" class="form-control" value="{{ $footerData->tiktok }}">
                </div>
                <div class="form-group">
                    <label for="youtube">Youtube</label>
                    <input type="url" name="youtube" class="form-control" value="{{ $footerData->youtube }}">
                </div>
                <div class="form-group">
                    <label for="terms">Términos</label>
                    <textarea name="terms" class="form-control">{{ $footerData->terms }}</textarea>
                </div>
                <div class="form-group">
                    <label for="return_policy">Política de Devolución</label>
                    <textarea name="return_policy" class="form-control">{{ $footerData->return_policy }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
            </form>
            @else
            <p>No hay datos disponibles para mostrar.</p>
            @endif
        </div>
    </div>
</div>

<!-- SweetAlert2 CSS -->
<link href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: "Buen trabajo!",
        text: "{{ session('success') }}",
        icon: "success"
    });
});
</script>
@endif
@endsection
