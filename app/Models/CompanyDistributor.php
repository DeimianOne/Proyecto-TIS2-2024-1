<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyDistributor extends Pivot
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }
}
