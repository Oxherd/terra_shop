@extends('partials.main')

@section('content')

    <div class="cart container">
        <h3>Your Cart:</h3>
        
        <ul class="head">
            <li>Name</li>
            <li>Price</li>
            <li>Quantity</li>
            <li>SubTotal</li>
        </ul>
        
        @if(session()->has('cart'))
        <ul class="menu">
            <li>
            @foreach(session()->get('cart') as $i => $cart_item)
            
                <ul>
                    <li>{{ $cart_item['name'] }}</li>
                    <li>{{ $cart_item['price'] }}</li>
                    <li>{{ $cart_item['quantity'] }}</li>
                    <li>{{ $subtotal = $cart_item['price'] * $cart_item['quantity'] }}</li>
                    
                    <form class="delete" action="/carts/{{ $i }}" method="POST">
                        {{ csrf_field() }}{{ method_field('delete') }}
                        <button><i class="far fa-trash-alt"></i></button>
                    </form>
                </ul>
            
            @endforeach
            </li>
        </ul>
        
        <h3>Total: {{ $total }} 
        
            <form action="/orders" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="total" value="{{ $total }}"/>
                <button>Checkout</button>
            </form>
            
        </h3>
        
        @endif
    </div>

@endsection