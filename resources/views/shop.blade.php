@include('layouts.head')
@include('layouts.navbar')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cervezas</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-7">
                    <h4>Cervezas</h4>
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach($beers as $beer)
                    <div class="col-lg-3">
                        <div class="card" style="margin-bottom: 20px; height: auto;">
                            <img src="{{ $beer->product->image }}"
                                 class="card-img-top mx-auto"
                                 style="height: 300px; width: 150px; display: block;"
                                 alt="{{ $beer->product->name }}">
                            <div class="card-body">
                                <a href=""><h6 class="card-title">{{ $beer->product->name }}</h6></a>
                                <p>${{ $beer->product->value }}</p>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $beer->product->id }}" id="id" name="id">
                                    <input type="hidden" value="{{ $beer->product->name }}" id="name" name="name">
                                    <input type="hidden" value="{{ $beer->product->value }}" id="price" name="price">
                                    <input type="hidden" value="{{ $beer->product->image }}" id="img" name="img">
                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                    <div class="card-footer" style="background-color: white;">
                                        <div class="row">
                                            <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                <i class="fa fa-shopping-cart"></i> agregar al carrito
                                            </button>
                                        </div>
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

@include('layouts.footer')
