@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="container">
            <div class="section-title">
                <h1 class="display-4">Arma tu Pack</h1>
            </div>
            <div class="row">
                <div class="col">
                    <div class="image-armatupack">
                        <img src="img\fuzz\6pack.png" class="img-fluid" alt="6pack">
                        <a href="product-pack6">6Pack</a>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="image-armatupack">
                        <img src="img\fuzz\12pack.png" class="img-fluid" alt="12pack">
                        <a href="product-pack12">12Pack</a>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="image-armatupack">
                        <img src="img\fuzz\24pack.png" class="img-fluid" alt="24pack">
                        <a href="product-pack24">24Pack</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
