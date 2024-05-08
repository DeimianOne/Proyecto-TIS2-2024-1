Sección para editar producto

<form action="{{ url('/beerFormat/'.$beerFormat->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('beerFormat.form', ['modo'=>'Editar'] )

</form>

