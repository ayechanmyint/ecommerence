@extends('layouts.main')

@section('content')

    <div class="container-fluid px-4 py-4">
            <div class="row">
                    <div class="col-lg-6 offset-lg-2">
                        <div class="d-flex py-2">
                            <h2> Thank you for your purchase!!!! </h2>           
                        </div>
                     <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                             <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($last_items->cart->items as $x=>$last_item)
                                    <tr>
                                       <td>{{++$x}}</td>
                                       <td>{{$last_item->product->name}}</td>
                                       <td>${{$last_item->product->price}}</td>
                                       <td>{{$last_item->qty}}</td>
                                       <td>${{$last_item->product->price}}</td>
                                       
                                    </tr>
                                   @endforeach
                                   <tr><td>GrandTotal=>${{$total_cost}}</td>  </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>

            </div>
        </div>
           
    </div>        

@endsection