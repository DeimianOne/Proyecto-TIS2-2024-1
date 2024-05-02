@include('layouts.head')
@include('layouts.navbar')


<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Cervezas</h4>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="text-center text-primary">Devil's Persuasion</h5>
                <img src="img/fuzz/latas/devil.png" class="img-fluid" alt="Devil Pack">
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="text-center text-primary">Distorsion Ipa</h5>
                <img src="img/fuzz/latas/distorsion.png" class="img-fluid" alt="Distorsion Pack">
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="text-center text-primary">The Wall</h5>
                <img src="img/fuzz/latas/thewall.png" class="img-fluid" alt="Thewall Pack">
            </div>
        </div>
    </div>
</div>



@include('layouts.footer')