@extends('layouts.backend')

@section('css_before')
    <!-- SweetAlert2 CSS -->
    <link href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default ">
            <h3 class="block-title">Crear Nuevo Pack</h3>
        </div>
        <div class="block-content block-content-full d-flex justify-content-center">
            <div class="col-lg-8">

                @dump($errors)

                <form action="{{ route('displays.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2 form-group">
                        <label class="form-label" for="display_type">Tamaño del Pack</label>
                        <select class="form-control" id="display_type" name="display_type" required>
                            <option value="six_beers">6 Cervezas</option>
                            <option value="twelve_beers">12 Cervezas</option>
                            <option value="twentyfour_beers">24 Cervezas</option>
                        </select>
                    </div>

                    <div class="mb-2 form-group">
                        <label class="form-label" for="name">Nombre del Pack</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del pack" required>
                    </div>

                    <div class="mb-2 form-group">
                        <label class="form-label" for="description">Descripción</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Descripción del producto" required></textarea>
                    </div>

                    <div class="mb-2 form-group">
                        <label class="form-label" for="value">Valor</label>
                        <input type="number" class="form-control" id="value" name="value" placeholder="Valor del pack" required>
                    </div>

                    <!-- Selección de cervezas -->
                    <div class="mb-2 form-group">
                        <label class="form-label" for="beers-select">Seleccionar Cervezas</label>
                        <select class="form-control" id="beers-select">
                            @foreach($beers as $beer)
                                <option value="{{ $beer->id }}">{{ $beer->product->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-secondary mt-3" id="add-beer">Agregar Cerveza</button>
                    </div>

                    <div class="mb-2 form-group">
                        <label class="form-label" for="beers">Cervezas Seleccionadas</label>
                        <ul id="selected-beers" class="list-group"></ul>
                    </div>

                    <div class="mb-3 form-group">
                        <label class="form-label" for="image">Imagen</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="URL de la imagen del producto">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <!-- SweetAlert2 JS -->
    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            function getMaxBeers() {
                var displayType = $('#display_type').val();
                if (displayType === 'six_beers') {
                    return 6;
                } else if (displayType === 'twelve_beers') {
                    return 12;
                } else if (displayType === 'twentyfour_beers') {
                    return 24;
                }
                return 0;
            }

            function clearSelectedBeers() {
                $('#selected-beers').empty();
            }

            $('#display_type').change(function() {
                clearSelectedBeers();
            });

            $('#add-beer').click(function() {
                var selectedBeerCount = $('#selected-beers li').length;
                var maxBeers = getMaxBeers();

                if (selectedBeerCount < maxBeers) {
                    var beerId = $('#beers-select').val();
                    var beerName = $('#beers-select option:selected').text();

                    if (beerId) {
                        var listItem = `<li class="list-group-item d-flex justify-content-between align-items-center">
                                            ${beerName}
                                            <button type="button" class="btn btn-danger btn-sm remove-beer" data-id="${beerId}">Quitar</button>
                                            <input type="hidden" name="beers[]" value="${beerId}">
                                        </li>`;
                        $('#selected-beers').append(listItem);
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Límite Alcanzado',
                        text: 'Has alcanzado el límite de cervezas para este pack.',
                    });
                }
            });

            $(document).on('click', '.remove-beer', function() {
                $(this).closest('li').remove();
            });

            @if($errors->any())
                var errorMessage = '';
                @foreach ($errors->all() as $error)
                    errorMessage += '{{ $error }}\n';
                @endforeach
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                });
            @endif

            @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
            @endif
        });
    </script>
@endsection
