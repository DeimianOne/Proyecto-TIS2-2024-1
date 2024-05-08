@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif

<a href="{{ url('product/create') }}">Registra nuevo producto</a>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Tipo producto</th>
            <th>Valor</th>
            <th>Imagen</th>
            <th>Contador vistas</th>
            <th>Stock</th>
            <th>Fecha creación</th>
            <th>Fecha actualización</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product -> id}}</td>
            <td>{{$product -> type_product}}</td>
            <td>{{$product -> value}}</td>
            <td>{{$product -> image}}</td>
            <td>{{$product -> view_count}}</td>
            <td>{{$product -> stock}}</td>
            <td>{{$product -> created_at}}</td>
            <td>{{$product -> updated_at}}</td>
            <td>
                
            <a href="{{ url('/product/'.$product->id.'/edit')}}">
                Editar
            </a> 
            
            <form action="{{url('/product/'.$product -> id)}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm ('¿ Quieres borrar ?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>






</table>