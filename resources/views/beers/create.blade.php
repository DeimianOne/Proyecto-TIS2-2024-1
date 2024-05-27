@extends('layouts.backend')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default ">
        <h3 class="block-title">Crear Nueva Cerveza</h3>
    </div>
    <div class="block-content block-content-full d-flex justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('beers.store') }}">
                @csrf

                <!-- Error Display Section -->
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <div class="form-group">   
                        <select name="product_id" id="product_id" class="form-control">
                            @foreach($producttypes as $producttype)
                                <option value="{{ $producttype->id }}" {{ old('product_id') == $producttype->id ? 'selected' : '' }}>
                                    {{ $producttype->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="beerstyle_id">Estilo cerveza</label>
                    <div class="form-group">
                        <select name="beerstyle_id" id="beerstyle_id" class="form-control">
                            @foreach($beerstyles as $beerstyle)
                                <option value="{{ $beerstyle->id }}" {{ old('beerstyle_id') == $beerstyle->id ? 'selected' : '' }}>
                                    {{ $beerstyle->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="beerformat_id">Formato cerveza</label>
                    <div class="form-group">
                        <select name="beerformat_id" id="beerformat_id" class="form-control">
                            @foreach($beerformats as $beerformat)
                                <option value="{{ $beerformat->id }}" {{ old('beerformat_id') == $beerformat->id ? 'selected' : '' }}>
                                    {{ $beerformat->container }} {{ $beerformat->liters }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="liter_value">Valor por litro</label>
                    <input type="text" class="form-control" id="liter_value" name="liter_value" placeholder="Valor por litro de la cerveza" value="{{ old('liter_value') }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
