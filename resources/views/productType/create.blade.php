Sección para crear empleados
<form action="{{ url('/productType') }}" method="post">

@csrf

@include('productType.form', ['modo'=>'Crear'] )

</form>