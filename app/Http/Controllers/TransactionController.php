<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;
use App\Cart;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        

        if (auth()->check()) {
              if(auth()->user()->active_cart->completed_at == null){

                $current_cart= auth()->user()->active_cart;

                $customer_id =auth()->user()->id;
            
                $transaction = Transaction::store();

              
                              
                    $cart_items = $current_cart->items;
                    $transaction_id = $transaction->id;


                    foreach($cart_items as $cart_item){
                        $product_id = $cart_item->product->id;
                        $cost= $cart_item->product->price;
                        $transaction_detail = TransactionDetail::store($transaction_id,$product_id,$cost);

                    }


                    $completed_at = Cart::completeFill($customer_id);
                    return redirect('/list-buy');

                }else{
                    dd('Need ');
                }

                
            } else {

                dd("Need to redriect to the login page");
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
