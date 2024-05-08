Sección para crear empleados
<form action="{{ url('/beerStyle') }}" method="post">

@csrf

@include('beerStyle.form', ['modo'=>'Crear'] )

</form>