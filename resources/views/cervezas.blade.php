@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Cervezas</h4>
        </div>
        <div class="row row-cols-3">

            <div class="col-lg-3">
                <div class="card" style="margin-bottom: 20px; height: auto;">
                    <img src="img/fuzz/latas/devil.png" class="card-img-top mx-auto" style="height: auto; width: 150px;display: block;" alt="img/fuzz/latas/devil.png">
                    <div class="card-body">
                        <a href=""><h6 class="card-title">Devil's Persuasion</h6></a>
                        <p>$5000</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card" style="margin-bottom: 20px; height: auto;">
                    <img src="img/fuzz/latas/distorsion.png" class="card-img-top mx-auto" style="height: auto; width: 150px;display: block;" alt="img/fuzz/latas/distorsion.png">
                    <div class="card-body">
                        <a href=""><h6 class="card-title">Distorsion Ipa</h6></a>
                        <p>$10000</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card" style="margin-bottom: 20px; height: auto;">
                    <img src="img/fuzz/latas/thewall.png" class="card-img-top mx-auto" style="height: auto; width: 150px;display: block;" alt="img/fuzz/latas/thewall.png">
                    <div class="card-body">
                        <a href=""><h6 class="card-title">The Wall</h6></a>
                        <p>$15000</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card" style="margin-bottom: 20px; height: auto;">
                    <img src="img/fuzz/latas/elrucio.png" class="card-img-top mx-auto" style="height: auto; width: 255px;display: block;" alt="img/fuzz/latas/elrucio.png">
                    <div class="card-body">
                        <a href=""><h6 class="card-title">El Rucio</h6></a>
                        <p>$20000</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('layouts.footer')
