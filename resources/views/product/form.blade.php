<h2> {{$modo}} tipo producto</h2>
<br>
<label for="type_product">{{'Tipo producto'}}</label>
<input type="text" name="type_product" id="type_product" value="{{ isset($product -> type_product)?$product -> type_product:'' }}">
<br>
<label for="value">{{'Valor'}}</label>
<input type="text" name="value" id="value" value="{{ isset($product -> value)?$product -> value:'' }}">
<br>
<label for="image">{{'Imagen'}}</label>
<input type="text" name="image" id="image" value="{{ isset($product -> image)?$product -> image:'' }}">
<br>
<label for="view_count">{{'Contador vistas'}}</label>
<input type="text" name="view_count" id="view_count" value="{{ isset($product -> view_count)?$product -> view_count:'' }}">
<br>
<label for="stock">{{'Stock'}}</label>
<input type="text" name="stock" id="stock" value="{{ isset($product -> stock)?$product -> stock:'' }}">

<input type="submit" value="{{ $modo }} datos">

<a href="{{ url('product') }}">Regresar</a>