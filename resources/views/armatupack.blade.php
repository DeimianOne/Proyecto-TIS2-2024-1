@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container">
        <h4 class="text-center text-primary mb-4" style="letter-spacing: 5px;">Elige tu pack</h4>

        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 mb-4 text-center">
                <a href="product-pack6">
                    <img src="img/fuzz/latas/devil.png" class="img-fluid" alt="Imagen 1">
                </a>
                <div class="highlight-box">
                    <h5 class="text-primary">Pack de 6</h5>
                </div>
            </div>
            <div class="col-md-6 mb-4 text-center">
                <a href="product-pack12">
                    <img src="img/fuzz/latas/devil.png" class="img-fluid" alt="Imagen 2">
                </a>
                <div class="highlight-box">
                    <h5 class="text-primary">Pack de 12</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
