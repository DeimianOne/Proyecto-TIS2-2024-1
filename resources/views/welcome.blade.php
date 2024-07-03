@include('layouts.head')

<!-- Navbar Start -->
@include('layouts.navbar')
<!-- Navbar End -->

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="blog-carousel" class="carousel slide overlay-bottom" data-bs-ride="carousel" data-interval="2000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/fuzz/etiquetas/devil1920x1080.png" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h3 class="display-1 text-white m-0">Fuzz</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/fuzz/etiquetas/elrucio1920x1080.png" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h3 class="display-1 text-white m-0">Fuzz</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/fuzz/etiquetas/hopexperience1920x1080.png" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h3 class="display-1 text-white m-0">Fuzz</h3>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#blog-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#blog-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Packs -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packs</h4>
            <h1 class="display-4">Elige tu Pack</h1>
        </div>
        <div class="row">
            @foreach($beers as $beer)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img src="{{ $beer->product->image }}" class="card-img-top" alt="{{ $beer->product->name }}">
                        <div class="card-body">
                            <h6 class="card-title">{{ $beer->product->name }}</h6>
                            <p class="card-text">${{ $beer->product->value }}</p>
                            <div class="d-flex justify-content-between">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $beer->product->id }}" name="id">
                                    <input type="hidden" value="{{ $beer->product->name }}" name="name">
                                    <input type="hidden" value="{{ $beer->product->value }}" name="price">
                                    <input type="hidden" value="{{ $beer->product->image }}" name="img">
                                    <input type="hidden" value="6" name="quantity">
                                    <button class="btn btn-secondary btn-sm" type="submit">Agregar 6</button>
                                </form>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $beer->product->id }}" name="id">
                                    <input type="hidden" value="{{ $beer->product->name }}" name="name">
                                    <input type="hidden" value="{{ $beer->product->value }}" name="price">
                                    <input type="hidden" value="{{ $beer->product->image }}" name="img">
                                    <input type="hidden" value="12" name="quantity">
                                    <button class="btn btn-secondary btn-sm" type="submit">Agregar 12</button>
                                </form>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $beer->product->id }}" name="id">
                                    <input type="hidden" value="{{ $beer->product->name }}" name="name">
                                    <input type="hidden" value="{{ $beer->product->value }}" name="price">
                                    <input type="hidden" value="{{ $beer->product->image }}" name="img">
                                    <input type="hidden" value="24" name="quantity">
                                    <button class="btn btn-secondary btn-sm" type="submit">Agregar 24</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


@include('layouts.footer')
