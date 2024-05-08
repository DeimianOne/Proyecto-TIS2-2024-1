<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingEdit;

class LandingEditController extends Controller
{
    public function index()
    {
         // Aquí obtendrías los datos dinámicos desde la base de datos
        $direccion = 'Calle Ejemplo 123';
        $numero = '123-456-789';
        $correo = 'ejemplo@correo.com';
/*        $facebook = 'https://www.facebook.com/ejemplo';
        $instagram = 'https://www.instagram.com/ejemplo/';
        $correoTrabajo = 'trabajo@ejemplo.com';
        $horario = 'Lunes a Viernes, 9am - 5pm';
*/
         // Pasas los datos a la vista
        return view('layouts.footer', compact('direccion', 'numero', 'correo'));
    }

    public function create()
    {
        return view('landingEdit.create');
    }

    public function store(Request $request)
    {
        $landingEdit = new LandingEdit();
        $data = $request->except('_token', '_method');
        $landingEdit->fill($data);
        
        // Guardar el nuevo registro en la base de datos
        $landingEdit->save();
    
        // Retornar la respuesta JSON con los datos guardados
        //return response()->json($productType);
        return redirect('landingEdit')->with('mensaje','Producto agregado con éxito');
    }

    public function edit( $id)
    {
        $landingEdit = LandingEdit::findOrFail($id);
        return view('landingEdit.edit', compact('landingEdit'));
    }

    public function update(Request $request, $id)
    {
        $datoslandingEdit = $request->except(['_token', '_method']);
        LandingEdit::where('id', '=', $id)->update($datoslandingEdit);
    
        $landingEdit = LandingEdit::findOrFail($id);
        return view('landingEdit.edit', compact('landingEdit'));
    }

    public function destroy($id)
    {
        LandingEdit::destroy($id);
        return redirect('landingEdit')->with('mensaje','Tipo producto eliminado');
    }
}
