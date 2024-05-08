<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer_Style extends Model
{   
    protected $table = 'beer_styles';
    protected $fillable = ['name'];

    public function beers()
    {
        return $this->hasMany('App\Beer', 'beer_style');
    }
}
