<h2> {{$modo}} tipo producto</h2>
<br>
<label for="name">{{'Nombre cerveza'}}</label>
<input type="text" name="name" id="name" value="{{ isset($beer -> name)?$beer -> name:'' }}">
<br>
<label for="beer_style">{{'Estilo cerveza'}}</label>
<input type="text" name="beer_style" id="beer_style" value="{{ isset($beer -> beer_style)?$beer -> beer_style:'' }}">
<br>
<label for="format">{{'Formato cerveza'}}</label>
<input type="number" name="format" id="format" value="{{ isset($beer -> format)?$beer -> format:'' }}">
<br>
<label for="litre_value">{{'Valor litro'}}</label>
<input type="number" name="litre_value" id="litre_value" value="{{ isset($beer -> litre_value)?$beer -> litre_value:'' }}">
<br>
<label for="image">{{'Imagen'}}</label>
<input type="text" name="image" id="image" value="{{ isset($beer -> image)?$beer -> image:'' }}">
<br>
<label for="count_views">{{'Contador vistas'}}</label>
<input type="number" name="count_views" id="count_views" value="{{ isset($beer -> count_views)?$beer -> count_views:'' }}">
<br>
<label for="stock">{{'Stock'}}</label>
<input type="number" name="stock" id="stock" value="{{ isset($beer -> stock)?$beer -> stock:'' }}">
<br>
<label for="type_product">{{'Tipo producto'}}</label>
<input type="text" name="type_product" id="type_product" value="{{ isset($beer -> type_product)?$beer -> type_product:'' }}">
<br>
<input type="submit" value="{{ $modo }} datos">
<br>
<a href="{{ url('beer') }}">Regresar</a>