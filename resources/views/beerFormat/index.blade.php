@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif

<a href="{{ url('beerFormat/create') }}">Registra un nuevo formato de cerveza</a>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Contenedor</th>
            <th>Litros</th>
            <th>Fecha creación</th>
            <th>Fecha actualización</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($beerFormats as $beerFormat)
        <tr>
            <td>{{$beerFormat -> id}}</td>
            <td>{{$beerFormat -> container}}</td>
            <td>{{$beerFormat -> liters}}</td>
            <td>{{$beerFormat -> created_at}}</td>
            <td>{{$beerFormat -> updated_at}}</td>
            <td>
                
            <a href="{{ url('/beerFormat/'.$beerFormat->id.'/edit')}}">
                Editar
            </a> 
            
            <form action="{{url('/beerFormat/'.$beerFormat -> id)}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm ('¿ Quieres borrar ?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>