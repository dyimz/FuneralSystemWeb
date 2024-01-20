<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    // Function to update the total price of the cart based on product quantities
    public function updateTotalPrice()
    {
        $this->total_price = $this->products->sum(function ($product) {
            return $product->pivot->quantity * $product->price;
        });

        $this->save();
    }
}

