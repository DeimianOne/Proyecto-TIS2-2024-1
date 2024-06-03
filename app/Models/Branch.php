<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'address_number',
        'phone_number',
        'branch_type',
        'company_id',
        'commune_id',
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

    public function communes()
    {
        return $this->belongsTo(Commune::class);
    }
}
