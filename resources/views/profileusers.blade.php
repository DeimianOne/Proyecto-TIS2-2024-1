@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <h1>Editar Perfil</h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <!-- Left Side: Profile Picture and Update Form -->
            <div class="col-md-7">
                <h3>Foto de Perfil</h3>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @if ($user->image)
                        <img src="{{ asset('images/' . $user->image) }}" alt="Profile Image" class="img-thumbnail mt-2"
                            style="width: 150px;">
                        @endif
                        <label for="image">Cambiar Foto de Perfil</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Foto</button>
                </form>
                <hr>
                <h3>Actualizar Datos</h3>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ $user->last_name }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Teléfono de Contacto</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ $user->phone_number }}">
                    </div>
                    <div class="form-group">
                        <label for="home">Vivienda</label>
                        <input type="text" class="form-control" id="home" name="home" value="{{ $user->home }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $user->address }}">
                    </div>
                    <div class="form-group">
                        <label for="number_address">Número de Dirección</label>
                        <input type="text" class="form-control" id="number_address" name="number_address"
                            value="{{ $user->number_address }}">
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Código Postal</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code"
                            value="{{ $user->postal_code }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                </form>
                <hr>
                <h3>Cambiar Contraseña</h3>
                <form action="{{ route('profile.change_password') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Contraseña Actual</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation">Confirmar Nueva Contraseña</label>
                        <input type="password" class="form-control" id="new_password_confirmation"
                            name="new_password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                </form>
            </div>
            <!-- Right Side: Additional Information -->
            <div class="col-md-4">
                <h3>Favoritos</h3>
                <hr>
                @auth
                @if($favorites->isEmpty())
                <p>No tienes cervezas en favoritos.</p>
                @else
                <ul>
                    @foreach($favorites as $favorite)
                    <li>
                        <img src="{{ $favorite->product->image }}" alt="{{ $favorite->product->name }}" width="100">
                        <p>{{ $favorite->product->name }}</p>
                    </li>
                    @endforeach
                </ul>
                @endif
                @else
                <p>Debes iniciar sesión para ver tus favoritos.</p>
                @endauth
            </div>

        </div>
    </div>
</div>

@include('layouts.footer')