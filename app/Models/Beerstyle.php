<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beerstyle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    //Uno a Muchos
    public function beers(){
        return $this->hasMany(Beer::class, 'beerstyle_id');
    }
}
