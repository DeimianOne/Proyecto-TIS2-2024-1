@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="section-title">
        </div>

        @if(session()->has('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        @if(session()->has('alert_msg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session()->get('alert_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endforeach
        @endif

        <div id="floating-cart" class="floating-cart">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <br>
                    @if(\Cart::getTotalQuantity() > 0)
                    <h4>{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</h4><br>
                    @else
                    <h4>No hay productos en tu carrito</h4><br>
                    <a href="{{ route('shop') }}" class="btn btn-dark">Continuar en la tienda</a>
                    @endif

                    @foreach($cartCollection as $item)
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{ $item->attributes->image }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b><br>
                                <b>Precio: </b>${{ $item->price }}<br>
                                <b>Subtotal: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                @if($item->name !== 'Pack Personalizado')
                                <form action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                        <input type="number" class="form-control form-control-sm"
                                            value="{{ $item->quantity }}" id="quantity" name="quantity"
                                            style="width: 70px; margin-right: 10px;">
                                        <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i
                                                class="fa fa-edit"></i></button>
                                    </div>
                                </form>
                                @endif
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                                @auth
                                <button class="btn btn-light btn-sm toggle-favorite" data-beer-id="{{ $item->id }}">
                                    <i
                                        class="fa{{ Auth::user()->favorites->contains($item->id) ? 's' : 'r' }} fa-star"></i>
                                </button>
                                @endauth
                            </div>
                        </div>

                    </div>
                    <hr>
                    @endforeach
                    @if(count($cartCollection) > 0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">Borrar Carrito</button>
                    </form>
                    @endif
                </div>
                @if(count($cartCollection) > 0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                        </ul>
                    </div>
                    <br><a href="{{ url('/cervezas') }}" class="btn btn-dark">Continuar en la tienda</a>
                    <a href="/checkout" class="btn btn-success">Proceder al Checkout</a>
                </div>
                @endif
            </div>
            <br><br>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-favorite').forEach(button => {
        button.addEventListener('click', function() {
            const beerId = this.getAttribute('data-beer-id');
            const icon = this.querySelector('i');

            fetch(`/favorite/${beerId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => {
                    if (response.status === 401) { // Usuario no autenticado
                        alert('Debes iniciar sesión para agregar favoritos.');
                        return;
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'added') {
                        icon.classList.remove('fa-regular');
                        icon.classList.add('fa-solid');
                    } else if (data.status === 'removed') {
                        icon.classList.remove('fa-solid');
                        icon.classList.add('fa-regular');
                    }
                });
        });
    });
});

</script>
