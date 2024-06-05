<?php

namespace Database\Seeders;

use App\Models\Beerformat;
use Illuminate\Database\Seeder;

class BeerformatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beerformat::create([
            'container' => 'Lata',
            'liters' => '0.350',
        ]);
    }
}
