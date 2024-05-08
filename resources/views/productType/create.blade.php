Sección para crear empleados
<form action="{{ route('productType.store') }}" method="post">

@csrf

@include('productType.form', ['modo'=>'Crear'] )

</form>