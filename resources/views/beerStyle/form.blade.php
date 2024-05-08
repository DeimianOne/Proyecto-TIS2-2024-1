<h2> {{$modo}} estilo cerveza</h2>
<br>
<label for="name">{{'Nombre estilo cerveza'}}</label>
<input type="text" name="name" id="name" value="{{ isset($beerStyle -> name)?$beerStyle -> name:'' }}">

<input type="submit" value="{{ $modo }} datos">

<a href="{{ url('beerStyle') }}">Regresar</a>