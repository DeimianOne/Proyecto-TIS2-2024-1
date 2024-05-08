<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Types extends Model
{    
    protected $table = 'product_types';
    protected $fillable = ['name'];

    public function beers()
    {
        return $this->hasMany('App\Beer', 'type_product');
    }
}