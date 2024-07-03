@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Editar Datos sección footer</h3>
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

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $ldgfooter->address }}">
                </div>
                <div class="form-group">
                    <label for="address_number">Address Number</label>
                    <input type="text" name="address_number" class="form-control" value="{{ $ldgfooter->address_number }}">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $ldgfooter->phone_number }}">
                </div>
                <div class="form-group">
                    <label for="business_email">Business Email</label>
                    <input type="email" name="business_email" class="form-control" value="{{ $ldgfooter->business_email }}">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ $ldgfooter->contact_email }}">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{ $ldgfooter->facebook }}">
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="{{ $ldgfooter->instagram }}">
                </div>
                <div class="form-group">
                    <label for="terms">Terms</label>
                    <textarea name="terms" class="form-control">{{ $ldgfooter->terms }}</textarea>
                </div>
                <div class="form-group">
                    <label for="return_policy">Return Policy</label>
                    <textarea name="return_policy" class="form-control">{{ $ldgfooter->return_policy }}"></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
            </form>
        </div>
    </div>
</div>

<!-- Select2 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        theme: "classic"
    });
});
</script>

@endsection
