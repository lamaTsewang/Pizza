<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'address', 'size_id', 'crust_id', 
        'extra_cheese', 'extra_sauce', 'total_price'
    ];

    public function toppings()
    {
        return $this->belongsToMany(Topping::class, 'order_topping');
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function crust()
    {
        return $this->belongsTo(Crust::class);
    }
}
