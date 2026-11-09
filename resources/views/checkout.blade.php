@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<!-- HEADER -->
<header class="bg-black text-white py-6">
    <div class="max-w-5xl mx-auto px-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold">🧾 Checkout</h1>

        <a href="/cart" class="bg-white text-black px-4 py-2 rounded hover:bg-gray-200">
            ← Volver al carrito
        </a>
    </div>
</header>

<!-- CONTENIDO -->
<main class="max-w-4xl mx-auto px-6 py-10">

    <!-- LISTA DE PRODUCTOS -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">

        <h2 class="text-xl font-bold mb-4">Resumen de tu compra</h2>

        <div class="space-y-4">

          @foreach($cart as $item)

    <div class="flex items-center justify-between border-b pb-4 gap-4">

        <!-- IMAGEN -->
        <div class="w-16 h-16 ">
            <img src="{{ $item['image'] ?? '/img/default.png' }}"
                 class="w-full h-full object-cover rounded">
        </div>

        <!-- INFO -->
        <div class="flex-1">
            <p class="font-semibold">{{ $item['name'] }}</p>
            <p class="text-sm text-gray-500">
                {{ $item['qty'] }} x ${{ number_format($item['price'], 0, ',', '.') }}
            </p>
        </div>

        <!-- SUBTOTAL -->
        <div class="font-bold text-gray-700">
            ${{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
        </div>

    </div>

@endforeach

        </div>
    </div>

    <!-- TOTAL -->
    <div class="bg-white rounded-lg shadow p-6 mb-6 text-center">

        <p class="text-gray-500">Total a pagar</p>
        <h2 class="text-3xl font-bold text-blue-600">
            ${{ number_format($total, 0, ',', '.') }}
        </h2>

    </div>

    <!-- BOTÓN PAGO -->
    <div class="text-center">

        <a href="/pay">
            <button class="bg-black hover:bg-green-700 text-white px-10 py-4 rounded text-lg font-bold transition">
                💳 Pagar con Transbank
            </button>
        </a>

        <p class="text-xs text-gray-500 mt-4">
            Serás redirigido a un entorno seguro de pago
        </p>

    </div>

</main>

@endsection


