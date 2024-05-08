Sección para editar producto

<form action="{{ url('/product/'.$product->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('product.form', ['modo'=>'Editar'] )

</form>

