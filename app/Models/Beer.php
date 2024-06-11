<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'beerstyle_id',
        'beerformat_id',
        'liter_value',
    ];

    //Uno a Muchos (Inversa)
    public function beerstyle(){
        return $this->belongsTo(Beerstyle::class, 'beerstyle_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    //Muchos a Muchos
    public function beerformat()
    {
        return $this->belongsTo(Beerformat::class, 'beerformat_id');
    }
}
