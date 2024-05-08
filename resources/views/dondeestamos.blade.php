@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Bares</h4>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="text-center text-primary">La Pinta</h5>
                <p>Dirección: Paicavi, Local 9, Concepción, Chile</p>
                <a href="https://www.instagram.com/LAPINTACCP" target="_blank">
                    <img src="ruta/al/logo_de_la_pinta.png" class="img-fluid" alt="La Pinta">
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="text-center text-primary">Bar Concepcion</h5>
                <p>Dirección: Av. Chacabuco 1224, Concepción, Bío Bío</p>
                <a href="https://www.instagram.com/BARCONCEPCION" target="_blank">
                    <img src="ruta/al/logo_de_bar_concepcion.png" class="img-fluid" alt="Bar Concepcion">
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="text-center text-primary">El Bar de Lobos</h5>
                <p>Dirección: Aníbal Pinto 143, Concepción, Bio Bio</p>
                <a href="https://www.instagram.com/BARDELOBOS.CL" target="_blank">
                    <img src="ruta/al/logo_de_el_bar_de_lobos.png" class="img-fluid" alt="El Bar de Lobos">
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="text-center text-primary">Bar Independencia</h5>
                <p>Dirección: O'Higgins 1703, Concepción, Bío Bío</p>
                <a href="https://www.instagram.com/BARINDEPENDENCIACCP" target="_blank">
                    <img src="ruta/al/logo_de_bar_independencia.png" class="img-fluid" alt="Bar Independencia">
                </a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
