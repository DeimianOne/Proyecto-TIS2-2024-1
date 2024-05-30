<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'province_id',
    ];

    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }
}
