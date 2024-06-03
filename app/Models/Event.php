<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'start_date_time', 
        'end_date_time', 
        'location_latitude', 
        'location_longitude'
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class,'company_event');
    }
}
