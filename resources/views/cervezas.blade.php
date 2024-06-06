<!-- cervezas.blade.php -->
@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Cervezas</h4>
        </div>
        <div class="row row-cols-3">
            @foreach($beers as $beer)
            <div class="col mb-4">
                <h5 class="text-center text-primary">{{ $beer->product->name }}</h5>
                <img src="{{ $beer->product->image }}" class="img-fluid" alt="{{ $beer->product->name }}">
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')
