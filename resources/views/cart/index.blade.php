@extends('layouts.main')

@section('content')

    <cart-list>
    @foreach($current_cart->items as $item)
        <cart-item
            image_url="{{$item->product->image_url}}"
            price="{{$item->product->price}}"
            qty="{{$item->qty}}">
            {{$item->product->name}}
            <form slot="delete_form" method="POST" action="{{route('cart-item.destroy',$item->id)}}">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger">Remove</button>
            </form>
        </cart-item>
    @endforeach
    </cart-list>

     <checkout-form
        total_price="{{ $current_cart->cart_total_price }} "
        action_url="{{route('transaction.store')}}">
        @csrf
    </checkout-form>


@endsection
