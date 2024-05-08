Sección para crear empleados
<form action="{{ url('/beer') }}" method="post">

@csrf

@include('beer.form', ['modo'=>'Crear'] )

</form>