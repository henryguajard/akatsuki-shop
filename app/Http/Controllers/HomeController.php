<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    // HOME - Mostrar todos los productos desde BD
    public function index()
    {
        $products = Product::all();

        return view('home', compact('products'));
    }

    // DETALLE PRODUCTO
public function show($id)
{
    $product = Product::findOrFail($id);

    $reviews = [
        [
            'user' => 'Carlos',
            'rating' => 5,
            'comment' => 'Excelente calidad, muy preciso y cómodo.'
        ],
        [
            'user' => 'María',
            'rating' => 4,
            'comment' => 'Muy bueno para el precio.'
        ],
        [
            'user' => 'Felipe',
            'rating' => 5,
            'comment' => 'Llegó rápido y funciona perfecto.'
        ]
    ];

    return view('product', compact('product', 'reviews'));
}
}