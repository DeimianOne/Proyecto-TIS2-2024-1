@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Editar Sucursal</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('branches.update', $branch->id) }}">
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
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la sucursal"
                        value="{{ old('name', $branch->name) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Dirección"
                        value="{{ old('address', $branch->address) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="address_number">Número dirección</label>
                    <input type="number" class="form-control" id="address_number" name="address_number"
                        placeholder="Número dirección" value="{{ old('address_number', $branch->address_number) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="phone_number">Teléfono</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Teléfono"
                        value="{{ old('phone_number', $branch->phone_number) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="branch_type">Tipo de Sucursal</label>
                    <select class="form-control" id="branch_type" name="branch_type">
                        <option value="factory" {{ old('branch_type') == 'factory' ? 'selected' : '' }}>Fábrica</option>
                        <option value="retail_store" {{ old('branch_type') == 'retail_store' ? 'selected' : '' }}>Tienda
                            Minorista</option>
                        <option value="office" {{ old('branch_type') == 'office' ? 'selected' : '' }}>Oficina</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="company_id">Compañía</label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="commune_id">Comuna</label>
                    <select name="commune_id" id="commune_id" class="form-control">
                        @foreach($communes as $commune)
                        <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                        @endforeach
                    </select>
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
        title: "Buen trabajo!",
        text: "{{ session('success') }}",
        icon: "success"
    });
});
</script>
@endif
@endsection