Sección para editar producto

<form action="{{ url('/beer/'.$beer->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('beer.form', ['modo'=>'Editar'] )

</form>
