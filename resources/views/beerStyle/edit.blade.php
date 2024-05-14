Sección para editar producto

<form action="{{ url('/beerStyle/'.$beerStyle->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('beerStyle.form', ['modo'=>'Editar'] )

</form>

