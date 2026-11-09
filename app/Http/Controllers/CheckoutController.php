<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);

        return view('checkout', compact('cart', 'total'));
    }
}