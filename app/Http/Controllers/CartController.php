<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Mostrar carrito
    public function index()
    {
        return view('cart', [
            'cart' => session('cart', [])
        ]);
    }

    // Agregar producto
    public function add($id, Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $request->name,
                'price' => $request->price,
                'image' => $request->image,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect('/cart')->with('success', 'Producto agregado');
    }

    // Aumentar cantidad
    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
            session()->put('cart', $cart);
        }

        return redirect('/cart');
    }

    // Disminuir cantidad
    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']--;

            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return redirect('/cart');
    }

    // Eliminar producto completamente
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect('/cart');
    }
}
