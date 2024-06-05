<?php

namespace Database\Seeders;

use App\Models\Beerstyle;
use Illuminate\Database\Seeder;

class BeerstyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beerstyle::create([
            'name' => 'Ale',
        ]);
    }
}
