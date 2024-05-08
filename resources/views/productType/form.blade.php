<h2> {{$modo}} tipo producto</h2>
<br>
<label for="name">{{'Nombre'}}</label>
<input type="text" name="name" id="name" value="{{ $productType->name ?? '' }}">

<input type="submit" value="{{ $modo }} datos">

<a href="{{ url('productType') }}">Regresar</a>
