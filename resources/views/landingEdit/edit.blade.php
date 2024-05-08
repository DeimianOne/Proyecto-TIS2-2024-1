Sección para editar producto

<form action="{{ url('/landingEdit/'.$landingEdit->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('landingEdit.form', ['modo'=>'Editar'] )

</form>

