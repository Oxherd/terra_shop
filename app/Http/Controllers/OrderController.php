<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_detail;

class OrderController extends Controller
{
    public function cart()
    {
        $total = 0;

        if (session()->has('cart')) {
            $cart = session()->get('cart');

            foreach ($cart as $cart_item) {
                $total += $cart_item['price'] * $cart_item['quantity'];
            }
        }

        return view('carts.index', compact('total'));
    }

    public function addCart()
    {
        $this->validate(request(), [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required|min:1',
            ]);

        $cart_item = [
            'name' => request('name'),
            'price' => request('price'),
            'quantity' => request('quantity'),
            ];

        session()->push('cart', $cart_item);

        return redirect()->back();
    }

    public function removeCart($cart)
    {
        $carts = session()->get('cart');

        unset($carts[$cart]);

        session()->pull('cart', []);

        session()->put('cart', $carts);

        if (count($carts) <= 0) {
            session()->forget('cart');
        }

        return redirect()->back();
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('orders.index', compact(['orders']));
    }

    public function store()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $carts = session()->get('cart');

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'total_price' => request('total'),
            ]);

        foreach ($carts as $cart_item) {
            Order_detail::create([
                'order_id' => $order->id,
                'name' => $cart_item['name'],
                'price' => $cart_item['price'],
                'quantity' => $cart_item['quantity'],
                ]);
        }

        session()->forget('cart');

        return redirect('/orders');
    }
}
