<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['customer_id'];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }


    public static function completeFill($customerid){
        $cart = Cart::where('customer_id',$customerid)->where('completed_at',null)->first();
        $cart->completed_at =  date('Y-m-d H:i:s');
        return $cart->save();
    }

    public function getCartTotalPriceAttribute()
    {
        return $this->items->reduce(
            function ($carry, $item) {
                return $carry + $item->product->price;
            }
        );
    }

}
