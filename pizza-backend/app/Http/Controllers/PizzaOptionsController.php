<?php
namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Crust;
use App\Models\Topping;
use App\Models\Extra;

class PizzaOptionsController extends Controller
{
    public function getOptions()
    {
        $sizes = Size::all();
        $crusts = Crust::all();
        $toppings = Topping::all();
        $extras = Extra::all();

        return response()->json([
            'sizes' => $sizes,
            'crusts' => $crusts,
            'toppings' => $toppings,
            'extras' => $extras,
        ]);
    }
}
