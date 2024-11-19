<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topping;

class ToppingSeeder extends Seeder
{
    public function run()
    {
        Topping::insert([
            ['id' => 1, 'name' => 'Pepperoni', 'price' => 1.50],
            ['id' => 2, 'name' => 'Mushrooms', 'price' => 1.00],
            ['id' => 3, 'name' => 'Onions', 'price' => 0.75],
            ['id' => 4, 'name' => 'Ham', 'price' => 1.75],
            ['id' => 5, 'name' => 'Pineapple', 'price' => 1.25],
        ]);
    }
}
