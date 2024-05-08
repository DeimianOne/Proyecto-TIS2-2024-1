Sección para crear empleados
<form action="{{ url('/landingEdit') }}" method="post">

@csrf

@include('landingEdit.form', ['modo'=>'Crear'] )

</form>