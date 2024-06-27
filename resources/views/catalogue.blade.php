@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <img src="{{ $beer->product->image }}" alt="{{ $beer->product->name }}" class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <h1>{{ $beer->product->name }}</h1>
                <p>{{ $beer->product->description }}</p>
                <p class="h4 text-success">${{ $beer->product->value }}</p>

                @if($beer->product->stock > 0)
                <div class="text-center mt-3">
                    <form action="{{ route('cart.store') }}" method="POST" style="display: inline;">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $beer->product->id }}" name="id">
                        <input type="hidden" value="{{ $beer->product->name }}" name="name">
                        <input type="hidden" value="{{ $beer->product->value }}" name="price">
                        <input type="hidden" value="{{ $beer->product->image }}" name="img">
                        <input type="hidden" value="6" name="quantity">
                        <button class="btn btn-secondary btn-sm" type="submit">
                            <i class="fa fa-shopping-cart"></i> Agregar 6
                        </button>
                    </form>

                    <form action="{{ route('cart.store') }}" method="POST" style="display: inline;">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $beer->product->id }}" name="id">
                        <input type="hidden" value="{{ $beer->product->name }}" name="name">
                        <input type="hidden" value="{{ $beer->product->value }}" name="price">
                        <input type="hidden" value="{{ $beer->product->image }}" name="img">
                        <input type="hidden" value="12" name="quantity">
                        <button class="btn btn-secondary btn-sm" type="submit">
                            <i class="fa fa-shopping-cart"></i> Agregar 12
                        </button>
                    </form>

                    <form action="{{ route('cart.store') }}" method="POST" style="display: inline;">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $beer->product->id }}" name="id">
                        <input type="hidden" value="{{ $beer->product->name }}" name="name">
                        <input type="hidden" value="{{ $beer->product->value }}" name="price">
                        <input type="hidden" value="{{ $beer->product->image }}" name="img">
                        <input type="hidden" value="24" name="quantity">
                        <button class="btn btn-secondary btn-sm" type="submit">
                            <i class="fa fa-shopping-cart"></i> Agregar 24
                        </button>
                    </form>
                </div>
                @else
                <div class="text-center mt-3">
                    <button class="btn btn-secondary btn-sm" type="button" disabled>
                        <i class="fa fa-shopping-cart"></i> Fuera de stock
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
