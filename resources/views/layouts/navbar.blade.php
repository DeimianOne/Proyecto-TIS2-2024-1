<!-- Navbar -->
<div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <a href="{{ route('welcome') }}" class="navbar-brand px-lg-4 m-0">
            <img src="{{ asset('img/fuzz/logo4.png') }}" alt="Cerveza Fuzz Logo" class="logo">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav p-4 justify-content-center">
                <a href="packs" class="nav-item nav-link active">Packs</a>
                <a href="armatupack" class="nav-item nav-link disabled">Arma tu Pack</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tienda
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="cervezas">Cervezas</a>
                        <a class="dropdown-item disabled" href="productos">Productos</a>
                        <!-- Agrega más opciones si es necesario -->
                    </div>
                </div>
                <a href="dondeestamos" class="nav-item nav-link">¿Dónde estamos?</a>
                <a href="contacto" class="nav-item nav-link">Contacto</a>
                <a href="nosotros" class="nav-item nav-link">Nosotros</a>


            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
