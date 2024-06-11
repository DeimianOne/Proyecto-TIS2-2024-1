<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'value',
        'image',
        'stock',
        'visualizations',
        'beer_style_id',
        'beer_format_id',
        'visibility',
    ];

    public function beer(){
        return $this->hasOne(Beer::class, 'product_id');
    }

    public function merchandise(){
        return $this->hasOne(Merchandise::class, 'product_id');
    }
    public function beerstyle()
    {
        return $this->belongsTo(Beerstyle::class, 'beer_style_id');
    }
    public function beerformat()
    {
        return $this->belongsTo(Beerformat::class, 'beer_format_id');
    }
}
