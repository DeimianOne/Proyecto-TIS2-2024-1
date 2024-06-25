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

</div>

@include('layouts.footer')
