<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;

class ListBuyController extends Controller
{
    //
    public function index(){
    	$customer = auth()->user();
        $last_items = Transaction::get()->last();
     	$total_cost = $last_items->total_cost;
    	return view('list_buy.index',compact('last_items','total_cost'));
    }
}
