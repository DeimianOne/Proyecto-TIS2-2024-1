Sección para crear empleados
<form action="{{ url('/beerFormat') }}" method="post">

@csrf

@include('beerFormat.form', ['modo'=>'Crear'] )

</form>