@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
<!-- jQuery (required for DataTables plugin) -->
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')


<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">CERVECERIA FUZZ</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Examples</li>
                    <li class="breadcrumb-item active" aria-current="page">Plugin</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Info
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">Plugin Example</h3>
      </div>
      <div class="block-content">
        <p>
          This page showcases how easily you can add a plugin’s JS/CSS assets and init it using custom JS code.
        </p>
      </div>
    </div>
    END Info -->

    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Comunas<small></small></h3>
            <a href="{{ route('communes.create') }}" class="btn btn-sm btn-outline-primary"> Crear </a>

        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">id</th>
                        <th>Nombre</th>
                        <th>Provincia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($communes as $commune)
                    <tr>
                        <td class="text-center">{{$commune -> id}}</td>
                        <td class="fw-semibold">
                            <a href="javascript:void(0)">{{$commune -> name}}</a>
                        </td>
                        <td class="fw-semibold">
                            <a href="javascript:void(0)">{{$commune ->province->name}}</a>
                        </td>
                        <td>
                            <!-- Nueva columna para botones de editar y eliminar -->
                            <div class="d-inline-flex">
                                <a href="{{ route('communes.edit', $commune->id) }}"
                                    class="btn btn-sm btn-outline-warning me-2">Editar</a>
                                <form action="{{ route('communes.destroy', $commune->id) }}" method="POST" class="formEliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    var forms = document.querySelectorAll('.formEliminar');
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();
                Swal.fire({
                    title: "¿Estás seguro de eliminar este dato?",
                    text: "No podrás revertir este proceso!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Confirmar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            }, false);
        });
});
</script>
    @endsection