@include('layouts.head')
@include('layouts.navbar')


<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="section-title">
        </div>
        <div class="row justify-content-center">
            <!-- Columna del filtro -->
            <div class="col-lg-3" style="margin-top: 100px;">
                <!-- Filtro de precios -->
                <form action="{{ route('shop') }}" method="GET" id="price-filter-form" class="mb-4">
                    <div class="form-group">
                        <label for="price-slider">Rango de Precios</label>
                        <div id="price-slider" style="margin-bottom: 20px;"></div>
                        <input type="hidden" name="min_price" id="min-price"
                            value="{{ request('min_price', $minBeerPrice) }}">
                        <input type="hidden" name="max_price" id="max-price"
                            value="{{ request('max_price', $maxBeerPrice) }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Filtrar por Precio</button>
                </form>

                <!-- Filtro de formato de contenedor -->
                <form action="{{ route('shop') }}" method="GET" id="container-filter-form">
                    <div class="form-group">
                        <label for="container">Formato de Contenedor</label>
                        @foreach($beerformats as $format)
                        <div class="form-check">
                            <input type="checkbox" name="containers[]" value="{{ $format->container }}"
                                class="form-check-input" id="container-{{ $format->id }}"
                                {{ in_array($format->container, request('containers', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="container-{{ $format->id }}">
                                {{ ucfirst($format->container) }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Filtrar por Contenedor</button>
                </form>

                <!-- Botón para restablecer los filtros -->
                <form action="{{ route('shop') }}" method="GET" id="reset-filter-form" class="mt-4">
                    <button type="submit" class="btn btn-secondary btn-block">Restablecer Filtros</button>
                </form>
            </div>

            <!-- Columnas de las cervezas -->
            <div class="col-lg-9">
                <div class="row mt-5 pt-5">
                    @foreach($beers as $beer)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="{{ $beer->product->image }}" class="card-img-top"
                                style="height: auto; object-fit: cover;" alt="{{ $beer->product->name }}">
                            <div class="card-body">
                                <a href="{{ route('cervezas.showAndIncrement', ['id' => $beer->id]) }}"
                                    class="text-decoration-none">
                                    <h6 class="card-title">{{ $beer->product->name }}</h6>
                                </a>
                                <div class="d-flex align-items-center">
                                    <i class="far fa-eye me-2"></i> <!-- Icono de Font Awesome -->
                                    <span>{{ $beer->product->visualizations }}</span>
                                </div>
                                <p class="card-text">${{ $beer->product->value }}</p>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $beer->product->id }}" name="id">
                                    <input type="hidden" value="{{ $beer->product->name }}" name="name">
                                    <input type="hidden" value="{{ $beer->product->value }}" name="price">
                                    <input type="hidden" value="{{ $beer->product->image }}" name="img">
                                    <input type="hidden" value="1" name="quantity">
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    var slider = document.getElementById('price-slider');
    var minPrice = parseInt('{{ $minBeerPrice }}');
    var maxPrice = parseInt('{{ $maxBeerPrice }}');

    if (!isNaN(minPrice) && !isNaN(maxPrice)) {
        if (slider) {
            noUiSlider.create(slider, {
                start: [minPrice, maxPrice],
                connect: true,
                range: {
                    'min': minPrice,
                    'max': maxPrice
                },
                step: 100,
                tooltips: [true, true],
                format: {
                    to: function(value) {
                        return Math.round(value);
                    },
                    from: function(value) {
                        return Number(value);
                    }
                }
            });

            slider.noUiSlider.on('update', function(values, handle) {
                document.getElementById('min-price').value = values[0];
                document.getElementById('max-price').value = values[1];
            });
        }
    } else {
        console.error('Error: minPrice or maxPrice is not a number.');
    }
});
</script>