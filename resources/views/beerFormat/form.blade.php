<h2> {{$modo}} formato cerveza </h2>
<br>
<label for="container">{{'Contenedor'}}</label>
<input type="text" name="container" id="container" value="{{ isset($beerFormat -> container)?$beerFormat -> container:'' }}">
<br>
<label for="liters">{{'Litros'}}</label>
<input type="text" name="liters" id="liters" value="{{ isset($beerFormat -> liters)?$beerFormat -> liters:'' }}">

<input type="submit" value="{{ $modo }} datos">

<a href="{{ url('beerFormat') }}">Regresar</a>