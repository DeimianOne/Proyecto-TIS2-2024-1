@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="pack-builder">
            <div class="beer-options">
                <!-- Aquí deberías listar las opciones de cervezas que el usuario puede elegir -->
                <div class="beer" data-src="img/fuzz/latas/devil.png"><img src="img/fuzz/latas/devil.png" alt="Cerveza 1"></div>
                <div class="beer" data-src="img/fuzz/latas/boldrooster.png"><img src="img/fuzz/latas/boldrooster.png" alt="Cerveza 2"></div>
                <div class="beer" data-src="img/fuzz/latas/distorsion.png"><img src="img/fuzz/latas/distorsion.png" alt="Cerveza 3"></div>
                <div class="beer" data-src="img/fuzz/latas/elrucio.png"><img src="img/fuzz/latas/elrucio.png" alt="Cerveza 4"></div>
                <div class="beer" data-src="img/fuzz/latas/hellfish.png"><img src="img/fuzz/latas/hellfish.png" alt="Cerveza 5"></div>
                <div class="beer" data-src="img/fuzz/latas/hopexperience.png"><img src="img/fuzz/latas/hopexperience.png" alt="Cerveza 6"></div>
                <div class="beer" data-src="img/fuzz/latas/imperial.png"><img src="img/fuzz/latas/imperial.png" alt="Cerveza 7"></div>
                <div class="beer" data-src="img/fuzz/latas/kingkong.png"><img src="img/fuzz/latas/kingkong.png" alt="Cerveza 8"></div>
                <!-- Agrega más divs para más opciones de cerveza -->
            </div>
            <div class="pack-container"> <!-- Nuevo contenedor para el pack -->
                <div class="pack">
                    <!-- Aquí se mostrarán las cervezas que el usuario ha elegido -->
                </div>
            </div>
            <button class="add-to-cart" disabled>Agregar al carrito</button>
        </div>
    </div>
</div>


@include('layouts.footer')