<div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
    <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">¿Necesitas ayuda?</h4>
            <p><i class="fa fa-map-marker-alt me-2"></i>Dirección: {{ $footerData->address ?? 'Dirección no disponible' }}</p>
            <p><i class="fa fa-phone-alt me-2"></i>Número: {{ $footerData->phone_number ?? 'Número no disponible' }}</p>
            <p class="m-0"><i class="fa fa-envelope me-2"></i>Correo: {{ $footerData->business_email ?? 'Correo no disponible' }}</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Redes Sociales</h4>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-outline-light btn-lg-square me-2" href="{{ $footerData->facebook ?? '#' }}"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square" href="{{ $footerData->instagram ?? '#' }}"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">¿Quieres trabajar con nosotros?</h4>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Política</h4>
            <div>
                <a class="text-white " href="#">Terminos del servicio.</a><br>
                <a class="text-white " href="#">Ley 19.995</a><br>
                <a class="text-white " href="#">{{ $footerData->terms ?? 'Términos no disponibles' }}</a><br>
                <a class="text-white " href="#">{{ $footerData->return_policy ?? 'Política de devolución no disponible' }}</a>
            </div>
        </div>
    </div>
    <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <p class="mb-2 text-white">Copyright &copy; <a class="fw-bold" href="#">Domain</a></a>
        </p>
    </div>
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/js/tempus-dominus.min.js"
    crossorigin="anonymous"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>
