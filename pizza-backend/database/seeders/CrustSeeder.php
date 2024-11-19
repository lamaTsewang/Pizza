<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crust;

class CrustSeeder extends Seeder
{
    public function run()
    {
        Crust::insert([
            ['id' => 1, 'name' => 'Thin Crust', 'price' => 2.00],
            ['id' => 2, 'name' => 'Thick Crust', 'price' => 2.50],
            ['id' => 3, 'name' => 'Stuffed Crust', 'price' => 3.00],
        ]);
    }
}
