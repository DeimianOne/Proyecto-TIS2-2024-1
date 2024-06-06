@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="pack-builder">
            <div class="beer-options">
                <!-- Aquí listamos las opciones de cervezas que el usuario puede elegir -->
                @foreach($beers as $beer)
                <div class="beer" data-src="{{ $beer->product->image }}">
                    <img src="{{ $beer->product->image }}" class="img-fluid" alt="{{ $beer->product->name }}">
                </div>
                @endforeach
            </div>
            <div class="pack-container"> <!-- Nuevo contenedor para el pack -->
                <div class="pack">
                    <!-- Aquí se mostrarán las cervezas que el usuario ha elegido -->
                </div>
            </div>
            <button class="add-to-cart" disabled>Agregar al carrito</button>
        </div>
    </div>
</div>

@include('layouts.footer')