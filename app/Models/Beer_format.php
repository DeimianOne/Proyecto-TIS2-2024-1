<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer_Format extends Model
{
    protected $table = 'beer_formats';
    protected $fillable = ['container', 'liters'];

    public function beers()
    {
        return $this->hasMany('App\Beer', 'format');
    }
}
