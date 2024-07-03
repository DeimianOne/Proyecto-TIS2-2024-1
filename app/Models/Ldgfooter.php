<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ldgfooter extends Model
{
    use HasFactory;

    // Especifica los campos que se pueden asignar masivamente
    protected $fillable = [
        'address',
        'address_number',
        'phone_number',
        'business_email',
        'contact_email',
        'facebook',
        'x',
        'instagram',
        'tiktok',
        'youtube',
        'terms',
        'return_policy',
        'company_id',  // Asegúrate de incluir 'company_id' aquí
    ];

    // Relación inversa con la compañía
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
