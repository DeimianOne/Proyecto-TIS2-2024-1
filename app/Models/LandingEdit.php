<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingEdit extends Model
{
    protected $fillable = [
        'name',
        'nosotros',
        'cervezas',
        'color',
        'red_social',
        'bar_direccion',
        'barImg',
        'direccion',
        'telefono',
        'correo',
        'contactanos',
        'consulta',
    ];
}
