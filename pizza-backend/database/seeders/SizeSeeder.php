<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    public function run()
    {
        Size::insert([
            ['id' => 1, 'name' => 'Small', 'price' => 5.99],
            ['id' => 2, 'name' => 'Medium', 'price' => 7.99],
            ['id' => 3, 'name' => 'Large', 'price' => 9.99],
        ]);
    }
}

