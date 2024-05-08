<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{   
    protected $table = 'beers';
    protected $fillable = ['name', 'beer_style', 'format', 'litre_value', 'image', 'count_views', 'stock', 'type_product'];

    public function type()
    {
        return $this->belongsTo('App\ProductType', 'type_product');
    }

    public function format()
    {
        return $this->belongsTo('App\BeerFormat', 'format');
    }

    public function style()
    {
        return $this->belongsTo('App\BeerStyle', 'beer_style');
    }
}
