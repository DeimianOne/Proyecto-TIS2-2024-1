<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Display;
use App\Models\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $displays = Display::with('product', 'beers.product')->get();

        // Agrupar y contar cervezas para cada display
        foreach ($displays as $display) {
            $beerCounts = [];
            foreach ($display->beers as $beer) {
                if (isset($beerCounts[$beer->product->name])) {
                    $beerCounts[$beer->product->name]++;
                } else {
                    $beerCounts[$beer->product->name] = 1;
                }
            }
            $display->beerCounts = $beerCounts; // Si aparece un error con beerCounts aqui, es solo un error del autocompletado del IDE, el codigo si funciona

            // Convertir el nombre del tipo de pack a un nombre amigable
            $display->friendly_display_type = $this->getFriendlyDisplayType($display->display_type); // Aqui lo mismo que con beerCounts
        }

        return view('displays.index', compact('displays'));
    }

    private function getFriendlyDisplayType($displayType)
    {
        $friendlyNames = [
            'six_beers' => '6 cervezas',
            'twelve_beers' => '12 cervezas',
            'twentyfour_beers' => '24 cervezas',
        ];

        return $friendlyNames[$displayType] ?? $displayType;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Obtener todas las cervezas disponibles
        $beers = Beer::with('product')->get();

        // Verificar si hay al menos dos cervezas distintas
        if ($beers->count() < 2) {
            return redirect()->route('displays.index')->with('error', 'Debe haber al menos dos cervezas distintas en el sistema para crear un pack.');
        }

        return view('displays.create', compact('beers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:125|unique:products,name',
            'description' => 'required|string',
            'value' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'display_type' => 'required|in:six_beers,twelve_beers,twentyfour_beers',
            'beers' => 'required|array',
            'beers.*' => 'exists:beers,id', // Cada cerveza debe existir en la base de datos
        ], [
            'name.required' => 'El nombre del pack es obligatorio.',
            'name.max' => 'El nombre del pack no puede superar los 125 caracteres.',
            'name.unique' => 'El nombre del pack ya está en uso.',
            'description.required' => 'La descripción del pack es obligatoria.',
            'value.required' => 'El valor del pack es obligatorio.',
            'value.numeric' => 'El valor debe ser un número.',
            'value.min' => 'El valor no puede ser negativo.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
            'image.max' => 'La imagen no puede superar los 4MB.',
            'display_type.required' => 'El tipo de pack es obligatorio.',
            'display_type.in' => 'El tipo de pack debe ser uno de los siguientes: six_beers, twelve_beers, twentyfour_beers.',
            'beers.required' => 'Debes seleccionar cervezas para el pack.',
            'beers.array' => 'Las cervezas seleccionadas deben ser un arreglo.',
            'beers.*.exists' => 'Alguna de las cervezas seleccionadas no existe en el sistema.'
        ]);

        // Validación personalizada para la cantidad de cervezas
        $displayType = $request->input('display_type');
        $beerCount = count($request->input('beers'));

        $expectedBeerCount = [
            'six_beers' => 6,
            'twelve_beers' => 12,
            'twentyfour_beers' => 24,
        ][$displayType];

        if ($beerCount !== $expectedBeerCount) {
            return redirect()->back()->withErrors(['beers' => "Debes seleccionar exactamente $expectedBeerCount cervezas para este tipo de pack."])->withInput();
        }

        // Validación personalizada para al menos dos tipos distintos de cervezas
        $distinctBeersCount = count(array_unique($request->input('beers')));

        if ($distinctBeersCount < 2) {
            return redirect()->back()->withErrors(['beers' => 'Debes seleccionar al menos dos tipos distintos de cervezas para el pack.'])->withInput();
        }

        // Subir la imagen si se proporciona
        $imageUrl = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imageUrl = Storage::url($imagePath);
            Log::info('Imagen subida', ['path' => $imagePath, 'url' => $imageUrl]);
        }

        // Verificar stock de cervezas seleccionadas
        $beers = Beer::whereIn('id', $request->beers)->get();
        $beerCount = array_count_values($request->beers);
        $displayStock = PHP_INT_MAX; // Iniciar con el máximo posible

        // Establecer el stock del pack según la disponibilidad de las cervezas
        foreach ($beers as $beer) {
            $requiredStock = $beerCount[$beer->id];
            $availableStock = $beer->product->stock;
            $displayStock = min($displayStock, intdiv($availableStock, $requiredStock));
        }

        // Crear el producto
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'value' => $request->input('value'),
            'image' => $imageUrl,
            'stock' => $displayStock,
            'visualizations' => 0,
            'visibility' => true,
        ]);

        // Crear el pack
        $display = Display::create([
            'product_id' => $product->id,
            'display_type' => $request->input('display_type'),
            'ldgdisplay_visibility' => true, // Aquí estableces el valor de ldgpack_visibility
        ]);

        // Asociar las cervezas seleccionadas con el pack con timestamps
        $timestamp = now();
        $beerData = [];

        foreach ($request->beers as $beerId) {
            $beerData[] = ['beer_id' => $beerId, 'created_at' => $timestamp, 'updated_at' => $timestamp];
        }

        $display->beers()->attach($beerData);

        return redirect()->route('displays.index')->with('success', 'Pack creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function show(Display $display)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function edit(Display $display)
    {
        // Obtener todas las cervezas disponibles para seleccionar
        $beers = Beer::with('product')->get();

        // Renderizar la vista de edición con los datos necesarios
        return view('displays.edit', compact('display', 'beers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Display $display)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:125|unique:products,name,' . $display->product_id,
            'description' => 'required|string',
            'value' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'display_type' => 'required|in:six_beers,twelve_beers,twentyfour_beers',
            'beers' => 'required|array',
            'beers.*' => 'exists:beers,id', // Cada cerveza debe existir en la base de datos
        ], [
            'name.required' => 'El nombre del pack es obligatorio.',
            'name.max' => 'El nombre del pack no puede superar los 125 caracteres.',
            'name.unique' => 'El nombre del pack ya está en uso.',
            'description.required' => 'La descripción del pack es obligatoria.',
            'value.required' => 'El valor del pack es obligatorio.',
            'value.numeric' => 'El valor debe ser un número.',
            'value.min' => 'El valor no puede ser negativo.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
            'image.max' => 'La imagen no puede superar los 4MB.',
            'display_type.required' => 'El tipo de pack es obligatorio.',
            'display_type.in' => 'El tipo de pack debe ser uno de los siguientes: six_beers, twelve_beers, twentyfour_beers.',
            'beers.required' => 'Debes seleccionar cervezas para el pack.',
            'beers.array' => 'Las cervezas seleccionadas deben ser un arreglo.',
            'beers.*.exists' => 'Alguna de las cervezas seleccionadas no existe en el sistema.'
        ]);

        // Validación personalizada para la cantidad de cervezas
        $displayType = $request->input('display_type');
        $beerCount = count($request->input('beers'));

        $expectedBeerCount = [
            'six_beers' => 6,
            'twelve_beers' => 12,
            'twentyfour_beers' => 24,
        ][$displayType];

        if ($beerCount !== $expectedBeerCount) {
            return redirect()->back()->withErrors(['beers' => "Debes seleccionar exactamente $expectedBeerCount cervezas para este tipo de pack."])->withInput();
        }

        // Validación personalizada para al menos dos tipos distintos de cervezas
        $distinctBeersCount = count(array_unique($request->input('beers')));

        if ($distinctBeersCount < 2) {
            return redirect()->back()->withErrors(['beers' => 'Debes seleccionar al menos dos tipos distintos de cervezas para el pack.'])->withInput();
        }

        // Subir la imagen si se proporciona
        $imageUrl = $display->product->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imageUrl = Storage::url($imagePath);
            Log::info('Imagen subida', ['path' => $imagePath, 'url' => $imageUrl]);
        }

        // Verificar stock de cervezas seleccionadas
        $beers = Beer::whereIn('id', $request->beers)->get();
        $beerCount = array_count_values($request->beers);
        $displayStock = PHP_INT_MAX; // Iniciar con el máximo posible

        // Establecer el stock del pack según la disponibilidad de las cervezas
        foreach ($beers as $beer) {
            $requiredStock = $beerCount[$beer->id];
            $availableStock = $beer->product->stock;
            $displayStock = min($displayStock, intdiv($availableStock, $requiredStock));
        }

        // Actualizar el producto
        $display->product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'value' => $request->input('value'),
            'image' => $imageUrl,
            'stock' => $displayStock,
        ]);

        // Actualizar el pack
        $display->update([
            'display_type' => $request->input('display_type'),
        ]);

        // Sincronizar las cervezas seleccionadas con el pack usando array count_values
        $timestamp = now();
        $beerData = [];

        foreach ($beerCount as $beerId => $count) {
            for ($i = 0; $i < $count; $i++) {
                $beerData[] = ['beer_id' => $beerId, 'created_at' => $timestamp, 'updated_at' => $timestamp];
            }
        }
        $display->beers()->detach();
        $display->beers()->attach($beerData);

        return redirect()->route('displays.index')->with('success', 'Pack actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function destroy(Display $display)
    {
        // 1. Eliminar las relaciones en la tabla intermedia
        $display->beers()->detach();

        // 2. Eliminar el Display
        $display->delete();

        // 3. Eliminar el Product asociado
        $display->product->delete();

        return redirect()->route('displays.index')->with('success', 'Pack eliminado exitosamente.');
    }
}
