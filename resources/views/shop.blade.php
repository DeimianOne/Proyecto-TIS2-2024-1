@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Columna del filtro de precios -->
            <div class="col-lg-3" style="margin-top: 9em;">
                <form action="{{ route('shop') }}" method="GET" id="price-filter-form">
                    <div id="price-slider" style="margin-bottom: 20px;"></div>
                    <input type="hidden" name="min_price" id="min-price" value="{{ request('min_price', $minBeerPrice) }}">
                    <input type="hidden" name="max_price" id="max-price" value="{{ request('max_price', $maxBeerPrice) }}">
                    <button type="submit" class="btn btn-primary btn-block">Filtrar</button>
                </form>
            </div>

            <!-- Columnas de las cervezas -->
            <div class="col-lg-9">
                <div class="row mt-5 pt-5">
                    @foreach($beers as $beer)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <img src="{{ $beer->product->image }}" class="card-img-top" style="height: 300px; object-fit: cover;" alt="{{ $beer->product->name }}">
                                <div class="card-body">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title">{{ $beer->product->name }}</h6>
                                    </a>
                                    <p class="card-text">${{ $beer->product->value }}</p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $beer->product->id }}" name="id">
                                        <input type="hidden" value="{{ $beer->product->name }}" name="name">
                                        <input type="hidden" value="{{ $beer->product->value }}" name="price">
                                        <input type="hidden" value="{{ $beer->product->image }}" name="img">
                                        <input type="hidden" value="1" name="quantity">
                                        <div class="text-center mt-3">
                                            <button class="btn btn-secondary btn-sm" type="submit">
                                                <i class="fa fa-shopping-cart"></i> Agregar al carrito
                                            </button>
                                        </div>
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

<style>
    /* Estilo personalizado para los manejadores del slider */
    .noUi-horizontal .noUi-handle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
    }

    /* Estilo personalizado para las tooltips del slider */
    .noUi-tooltip {
        font-size: 14px;
        padding: 5px;
        border-radius: 4px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var slider = document.getElementById('price-slider');
        var minPrice = parseInt({{ $minBeerPrice }});
        var maxPrice = parseInt({{ $maxBeerPrice }});

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
    });
</script>
