<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'display_type',
        'ldgdisplay_visibility',
    ];

    //Uno a Muchos (Inversa)
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    //Muchos a Muchos
    public function beers(){
        return $this->belongsToMany(Beer::class, 'beer_display', 'display_id', 'beer_id');
    }
}
