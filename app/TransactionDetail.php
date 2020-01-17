<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    //
	protected $fillable = ['transaction_id','product_id','qty','cost'];

	public static function store($transaction_id,$product_id,$cost){
		$result = TransactionDetail::create([
			'transaction_id' => $transaction_id,
			'product_id'	=> $product_id,
			'qty'			=> 1,
			'cost'			=>$cost
	]);

	}

}
