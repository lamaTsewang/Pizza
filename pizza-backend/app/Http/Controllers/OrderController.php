<?php
namespace App\Http\Controllers;
use App\Models\Extra;
use App\Models\Order;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class OrderController extends Controller
{
    public function storeOrder(Request $request)
    {
        try {
            Log::info('Order Request: ', $request->all());
            
            $validated = $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'phone_number' => 'required|string',
                'address' => 'required|string',
                'size_id' => 'required|exists:sizes,id',
                'crust_id' => 'required|exists:crusts,id',
                'extra_cheese' => 'boolean',
                'extra_sauce' => 'boolean',
                'toppings' => 'array',
                'toppings.*' => 'exists:toppings,id',
            ]);
    
            $totalPrice = $request->size_price + $request->crust_price;
            $totalPrice += $request->extra_cheese ? $request->extra_cheese_price : 0;
            $totalPrice += $request->extra_sauce ? $request->extra_sauce_price : 0;
    
            $order = Order::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'phone_number' => $validated['phone_number'],
                'address' => $validated['address'],
                'size_id' => $validated['size_id'],
                'crust_id' => $validated['crust_id'],
                'extra_cheese' => $validated['extra_cheese'],
                'extra_sauce' => $validated['extra_sauce'],
                'total_price' => $totalPrice,
            ]);
    
            if ($request->toppings) {
                $order->toppings()->attach($validated['toppings']);
            }
    
            return response()->json([
                'message' => 'Order placed successfully!',
                'order' => $order,
            ]);
        } catch (\Exception $e) {
            Log::error('Order Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}