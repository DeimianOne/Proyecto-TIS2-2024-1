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
        'visibility',
    ];

    public function beer(){
        return $this->hasOne(Beer::class, 'product_id');
    }

    public function merchandise(){
        return $this->hasOne(Merchandise::class, 'product_id');
    }
}
