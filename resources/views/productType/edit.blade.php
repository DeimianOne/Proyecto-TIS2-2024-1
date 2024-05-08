Sección para editar producto

<form action="{{ route('productType.update', $productType->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('productType.form', ['modo'=>'Editar'] )

</form>

