@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container">
        <h4 class="text-center text-primary mb-4" style="letter-spacing: 5px;">Contáctanos</h4>

        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 mb-4">
                <p>
                    Si tienes alguna pregunta o deseas ponerte en contacto con nosotros, completa el siguiente formulario y nos pondremos en contacto contigo lo antes posible.
                </p>
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-md-6 mb-4">
                <p>
                    También puedes llamarnos directamente al siguiente número:
                </p>
                <p class="fw-bold">Teléfono: +123456789</p>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
