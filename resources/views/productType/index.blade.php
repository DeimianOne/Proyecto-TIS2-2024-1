@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif

<a href="{{ url('productType/create') }}">Registra nuevo tipo producto</a>

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
  
        @foreach($productTypes as $productType)
        <tr>
            <td>{{$productType -> id}}</td>
            <td>{{$productType -> name}}</td>
            <td>{{$productType -> created_at}}</td>
            <td>{{$productType -> updated_at}}</td>
            <td>
                
            <a href="{{ url('/productType/'.$productType->id.'/edit')}}">
                Editar
            </a> 
            
            <form action="{{url('/productType/'.$productType -> id)}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm ('¿ Quieres borrar ?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>






</table>