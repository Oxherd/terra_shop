@extends('partials.main')

@section('content')

    <div class="orders container">
        <h3>Your Orders:</h3>
        
        <ul class="list">
            @foreach($orders as $order)
                <li class="order">
                    <h4>{{ $order->created_at }}</h4>
                    
                    <ul class="head">
                        <li>Name</li>
                        <li>Price</li>
                        <li>Quantity</li>
                        <li>SubTotal</li>
                    </ul>
                        
                    @foreach($order->order_details as $order_detail)
                        
                        <ul class="order_details">
                            
                            
                            <li>{{ $order_detail->name }}</li>
                            <li>{{ $order_detail->price }}</li>
                            <li>{{ $order_detail->quantity }}</li>
                            <li>{{ $subtotal = $order_detail->quantity * $order_detail->price }}</li>
                        </ul>
                    @endforeach
                    
                    <h4>Total: {{ $order->total_price }}</h4>
                </li>
                
            @endforeach
        </ul>
    </div>

@endsection