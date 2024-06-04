<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    

    public function events()
    {
        return $this->belongsToMany(Event::class,'company_event');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function distributors()
    {
        return $this->belongsToMany(Distributor::class,'company_distributor');
    }
}
