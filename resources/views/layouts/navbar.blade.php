<!-- Navbar -->
<div class="container-fluid p-0 nav-bar ">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 ">
        <a href="{{ route('welcome') }}" class="navbar-brand px-lg-4 m-0 align-items-center d-flex">
            <img src="{{ asset('img/fuzz/logo4.png') }}" alt="Cerveza Fuzz Logo" class="logo align-middle">
            <span class="align-middle">Cerveza Fuzz</span>
        </a>

        <button type="button" class="navbar-toggler" aria-label="Toggle navigation" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav p-4 justify-content-center">
                <a href="{{ route('packs') }}" class="nav-item nav-link active">Packs</a>
                <a href="{{ route('armatupack') }}" class="nav-item nav-link">Arma tu Pack</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tienda
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('shop') }}">Cervezas</a>
                        <a class="dropdown-item disabled" href="productos">Productos</a>
                    </div>
                </div>
                <a href="{{ route('dondeestamos') }}" class="nav-item nav-link">¿Dónde estamos?</a>
                <a href="{{ route('contacto') }}" class="nav-item nav-link">Contacto</a>

            </div>


            <div class="navbar-nav ml-auto">

                @guest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">

                        </li>
                        <li class="nav-item dropdown">
                            <a href="{{ route('cart.index') }}" class="nav-link dropdown-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="badge badge-pill badge-dark">
                                    <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                                </span>
                            </a>
                


                            @if (Route::has('login'))
                            <a href="{{ route('iniciarsesion') }}" class="nav-item nav-link">
                                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                            </a>
                            @endif

                            @if (Route::has('register'))
                            <a href="{{ route('registrate') }}" class="nav-item nav-link">
                                <i class="fas fa-user-plus"></i> Registrarse
                            </a>
                            @endif
                            @else

                            @if(auth()->user()->hasRole('Administrador'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle mr-3" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        </li>
                    </ul>
                    @endguest
                </div>
            </div>
    </nav>

    <div id="ageVerificationPopup" class="age-verification-popup">
        <div class="age-verification-content">
            <div class="logo-container">
                <img src="img/fuzz/logo2.png" alt="Image">
            </div>
            <div class="separator"></div>
            <h2 id="popupTitle">¿Eres mayor de 18 años?</h2>
            <div id="buttons">
                <button id="yesButton">Sí</button>
                <button id="noButton">No</button>
            </div>
            <p id="ageRestrictionMessage" style="display:none; color:red;">Tiene que ser mayor de 18 para ingresar a
                nuestra página.</p>
        </div>
    </div>


</div>