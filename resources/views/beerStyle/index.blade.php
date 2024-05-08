@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif

<a href="{{ url('beerStyle/create') }}">Registra nuevo tipo producto</a>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Fecha creación</th>
            <th>Fecha actualización</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($beerStyles as $beerStyle)
        <tr>
            <td>{{$beerStyle -> id}}</td>
            <td>{{$beerStyle -> name}}</td>
            <td>{{$beerStyle -> created_at}}</td>
            <td>{{$beerStyle -> updated_at}}</td>
            <td>
                
            <a href="{{ url('/beerStyle/'.$beerStyle->id.'/edit')}}">
                Editar
            </a> 
            
            <form action="{{url('/beerStyle/'.$beerStyle -> id)}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm ('¿ Quieres borrar ?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>






</table>