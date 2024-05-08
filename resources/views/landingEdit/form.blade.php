<h2>{{$modo}} landing edit</h2>
<br>
<label for="nosotros">{{'Nosotros'}}</label>
<textarea name="nosotros" id="nosotros">{{ isset($landingEdit->nosotros) ? $landingEdit->nosotros : '' }}</textarea>
<br>
<label for="cervezas">{{'Cervezas'}}</label>
<input type="text" name="cervezas" id="cervezas" value="{{ isset($landingEdit->cervezas) ? $landingEdit->cervezas : '' }}">
<br>
<label for="color">{{'Color'}}</label>
<input type="text" name="color" id="color" value="{{ isset($landingEdit->color) ? $landingEdit->color : '' }}">
<br>
<label for="red_social">{{'Red Social'}}</label>
<input type="text" name="red_social" id="red_social" value="{{ isset($landingEdit->red_social) ? $landingEdit->red_social : '' }}">
<br>
<label for="bar_direccion">{{'Dirección del Bar'}}</label>
<input type="text" name="bar_direccion" id="bar_direccion" value="{{ isset($landingEdit->bar_direccion) ? $landingEdit->bar_direccion : '' }}">
<br>
<label for="barImg">{{'Imagen del Bar'}}</label>
<input type="text" name="barImg" id="barImg" value="{{ isset($landingEdit->barImg) ? $landingEdit->barImg : '' }}">
<br>
<label for="direccion">{{'Dirección'}}</label>
<input type="text" name="direccion" id="direccion" value="{{ isset($landingEdit->direccion) ? $landingEdit->direccion : '' }}">
<br>
<label for="telefono">{{'Teléfono'}}</label>
<input type="text" name="telefono" id="telefono" value="{{ isset($landingEdit->telefono) ? $landingEdit->telefono : '' }}">
<br>
<label for="correo">{{'Correo'}}</label>
<input type="text" name="correo" id="correo" value="{{ isset($landingEdit->correo) ? $landingEdit->correo : '' }}">
<br>
<label for="contactanos">{{'Contáctanos'}}</label>
<textarea name="contactanos" id="contactanos">{{ isset($landingEdit->contactanos) ? $landingEdit->contactanos : '' }}</textarea>
<br>
<label for="consulta">{{'Consulta'}}</label>
<textarea name="consulta" id="consulta">{{ isset($landingEdit->consulta) ? $landingEdit->consulta : '' }}</textarea>
<br>
<input type="submit" value="{{$modo}} datos">

<a href="{{ url('landingEdit') }}">Regresar</a>
