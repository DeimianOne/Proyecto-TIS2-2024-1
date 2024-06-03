<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyEvent extends Pivot
{
    protected $table = 'company_event';

    protected $fillable = [
        'company_id',
        'event_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
