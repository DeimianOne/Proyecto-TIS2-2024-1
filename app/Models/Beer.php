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
        'liter_value'
    ];

    //Uno a Muchos (Inversa)
    public function beerstyle(){
        return $this->belongsTo(Beerstyle::class, 'beerstyle_id');
    }

    //Muchos a Muchos
    public function beerformats(){
        return $this->belongsToMany(Beerformat::class, 'beer_beerformat', 'beer_id', 'beerformat_id');
    }
}
