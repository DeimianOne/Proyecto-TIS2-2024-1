@include('layouts.head')
@include('layouts.navbar')

<div class="container-fluid py-5">
    <div class="container mt-5 pt-5">
        <div class="section-title">
            <h1>Pago Fallido</h1>
            <p>Hubo un problema al procesar tu pago. Por favor, intenta nuevamente.</p>
            <a href="{{ route('welcome') }}" class="btn btn-primary">Volver a la Página Principal</a>
        </div>
    </div>
</div>
