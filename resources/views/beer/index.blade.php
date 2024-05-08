@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif

<a href="{{ url('beer/create') }}">Registra nueva cerveza</a>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Estilo cerveza</th>
            <th>Formato cerveza</th>
            <th>Valor litro</th>
            <th>Imagen</th>
            <th>Contador vistas</th>
            <th>Stock</th>
            <th>Tipo producto</th>
            <th>Fecha creación</th>
            <th>Fecha actualización</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($beers as $beer)
        <tr>
            <td>{{$beer -> id}}</td>
            <td>{{$beer -> name}}</td>
            <td>{{$beer -> beer_style}}</td>
            <td>{{$beer -> format}}</td>
            <td>{{$beer -> litre_value}}</td>
            <td>{{$beer -> image}}</td>
            <td>{{$beer -> count_views}}</td>
            <td>{{$beer -> stock}}</td>
            <td>{{$beer -> type_product}}</td>
            <td>{{$beer -> created_at}}</td>
            <td>{{$beer -> updated_at}}</td>
            <td>
                
            <a href="{{ url('/beer/'.$beer->id.'/edit')}}">
                Editar
            </a> 
            
            <form action="{{url('/beer/'.$beer -> id)}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm ('¿ Quieres borrar ?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>