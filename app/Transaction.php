<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable  = ['cart_id','customer_id','total_cost'];

    public static function store(){

    	return $result  = Transaction::create([

    		'cart_id'     => auth()->user()->active_cart->id,
    		'customer_id' => auth()->user()->id,
    		'total_cost'  => auth()->user()->active_cart->cart_total_price
    	]);
    }

    public function cart(){
    	 return $this->belongsTo(Cart::class);
    }
}
