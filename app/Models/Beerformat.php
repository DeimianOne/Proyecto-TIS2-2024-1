<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beerformat extends Model
{
    use HasFactory;

    protected $fillable = [
        'container',
        'liters',
    ];

    //Muchos a Muchos
    public function beers(){
        return $this->belongsToMany(Beer::class, 'beer_beerformat', 'beerformat_id', 'beer_id');
    }
}
