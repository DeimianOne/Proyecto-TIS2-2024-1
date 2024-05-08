@if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif

<a href="{{ url('landingEdit/create') }}">Crear nuevo Landing Edit</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nosotros</th>
            <th>Cervezas</th>
            <th>Color</th>
            <th>Red Social</th>
            <th>Bares</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Contáctanos</th>
            <th>Consulta</th>
            <th>Fecha creación</th>
            <th>Fecha actualización</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($landingEdits as $landingEdit)
            <tr>
                <td>{{$landingEdit->id}}</td>
                <td>{{$landingEdit->nosotros}}</td>
                <td>
                    @if($landingEdit->cervezas)
                        <img src="{{ asset($landingEdit->cervezas) }}" alt="Cervezas">
                    @endif
                </td>
                <td>{{$landingEdit->color}}</td>
                <td>{{$landingEdit->red_social}}</td>
                <td>
                    @if($landingEdit->bares)
                        <img src="{{ asset($landingEdit->bares) }}" alt="Bares">
                    @endif
                </td>
                <td>{{$landingEdit->direccion}}</td>
                <td>{{$landingEdit->telefono}}</td>
                <td>{{$landingEdit->correo}}</td>
                <td>{{$landingEdit->contactanos}}</td>
                <td>{{$landingEdit->consulta}}</td>
                <td>{{$landingEdit->created_at}}</td>
                <td>{{$landingEdit->updated_at}}</td>
                <td>
                    <a href="{{ url('/landingEdit/'.$landingEdit->id.'/edit')}}">
                        Editar
                    </a>
                    <form action="{{url('/landingEdit/'.$landingEdit->id)}}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm ('¿ Quieres borrar ?')" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
