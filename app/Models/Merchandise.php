<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
    ];

    //Uno a Muchos (Inversa)
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
