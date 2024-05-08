Sección para editar producto

<form action="{{ url('/productType/'.$productType->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('productType.form', ['modo'=>'Editar'] )

</form>

