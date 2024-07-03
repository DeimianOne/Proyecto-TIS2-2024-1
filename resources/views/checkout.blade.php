@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="section-title">
            <h1>Checkout</h1>
        </div>
        @guest
        <!-- Formulario para usuarios no registrados -->
        <form action="{{ route('webpay.create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="_name">Nombre</label>
                <input type="text" class="form-control" id="_name" name="_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Apellido</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Teléfono</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
            </div>
    @else
        <!-- Información prellenada para usuarios registrados -->
        <form action="{{ route('webpay.create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="last_name">Apellido</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ auth()->user()->last_name }}" readonly>
            </div>
            <div class="form-group">
                <label for="phone_number">Teléfono</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ auth()->user()->phone_number }}" readonly>
            </div>
    @endguest

    <div class="form-group">
        <label for="delivery_type">Tipo de Entrega</label>
        <select class="form-control" id="delivery_type" name="delivery_type" required>
            <option value="">Seleccione una opción</option>
            <option value="home_delivery">Despacho a Domicilio</option>
            <option value="store_pickup">Retiro en Tienda</option>
        </select>
    </div>

    <div id="home_delivery_fields" style="display: none;">
        <div class="form-group">
            <label for="region">Región</label>
            <select class="form-control" id="region" name="region">
                @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="province">Provincia</label>
            <select class="form-control" id="province" name="province">
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="commune">Comuna</label>
            <select class="form-control" id="commune" name="commune">
                @foreach ($communes as $commune)
                    <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="form-group">
            <label for="address_number">Número de Dirección</label>
            <input type="text" class="form-control" id="address_number" name="address_number">
        </div>
        @auth
            <div class="form-group">
                <label for="saved_address">Usar Dirección Guardada</label>
                <select class="form-control" id="saved_address" name="saved_address">
                    <option value="">Seleccione una dirección</option>
                    <!-- Aquí puedes agregar las direcciones guardadas del usuario -->
                </select>
            </div>
        @endauth
    </div>

    <div id="store_pickup_fields" style="display: none;">
        <div class="form-group">
            <label for="store_branch">Sucursal</label>
            <select class="form-control" id="store_branch" name="store_branch">
                @foreach ($storeBranches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="payment_method">Método de Pago</label>
        <select class="form-control" id="payment_method" name="payment_method" required>
            @foreach ($paymentMethods as $method)
                <option value="{{ $method->id }}">{{ $method->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Proceder al Pago</button>
    </form>
</div>

<script>
    document.getElementById('delivery_type').addEventListener('change', function () {
        var deliveryType = this.value;
        document.getElementById('home_delivery_fields').style.display = deliveryType === 'home_delivery' ? 'block' : 'none';
        document.getElementById('store_pickup_fields').style.display = deliveryType === 'store_pickup' ? 'block' : 'none';
    });
</script>
