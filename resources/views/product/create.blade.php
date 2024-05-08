Sección para crear empleados
<form action="{{ url('/product') }}" method="post">

@csrf

@include('product.form', ['modo'=>'Crear'] )

</form>