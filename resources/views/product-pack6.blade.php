@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="pack-builder">
            <div class="beer-options">
                
                @foreach($beers as $beer)
                <div class="beer" data-src="{{ $beer->product->image }}">
                    <img src="{{ $beer->product->image }}" class="img-fluid" alt="{{ $beer->product->name }}">
                </div>
                @endforeach
            </div>
            <div class="pack-container"> 
                <div class="pack">
                    
                </div>
            </div>
            <button class="add-to-cart" disabled>Agregar al carrito</button>
        </div>
    </div>
</div>

@include('layouts.footer')
