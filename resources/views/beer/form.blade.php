<h2> {{$modo}} tipo producto</h2>
<br>
<label for="name">{{'Nombre cerveza'}}</label>
<input type="text" name="name" id="name" value="{{ isset($beer -> name)?$beer -> name:'' }}">
<br>
<label for="beer_style">{{'Estilo cerveza'}}</label>
<div class="form-group">
    <select name="beer_style" id="beer_style" class="form-control">
        @foreach($beer_styles as $style)
            <option value="{{ $style -> id }}" {{old('beer_style') == $style->id ? 'selected' : '' }}>
                {{ $style->name }}
            </option>
        @endforeach
    </select>
</div>
<br>
<label for="format">{{'Formato cerveza'}}</label>
<div class="form-group">
    <select name="format" id="format" class="form-control">
        @foreach($beer_formats as $formato)
            <option value="{{ $formato -> id }}" {{old('format') == $formato->id ? 'selected' : '' }}>
                {{ $formato-> container }}{{ $formato-> liters }}
            </option>
        @endforeach
    </select>
</div>
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
<div class="form-group">
    
    <select name="type_product" id="type_product" class="form-control">
        @foreach($produc_types as $type_product)
            <option value="{{ $type_product -> id }}" {{old('type_product') == $type_product->id ? 'selected' : '' }}>
                {{ $type_product-> name }}
            </option>
        @endforeach
    </select>
</div>
<br>
<input type="submit" value="{{ $modo }} datos">
<br>
<a href="{{ url('beer') }}">Regresar</a>