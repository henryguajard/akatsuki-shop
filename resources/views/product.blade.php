@extends('layouts.app')

@section('title', $product->name)

@section('content')

<!-- ================= HEADER ================= -->
<header class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border-b border-cyan-500/20 py-6">

    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">

        <h1 class="text-3xl font-bold text-white">
            Detalle del Producto
        </h1>

        <a href="/"
            class="px-5 py-2 rounded-lg bg-cyan-500 hover:bg-cyan-400 text-white font-semibold transition">
            ← Volver
        </a>

    </div>

</header>

<!-- ================= PRODUCTO ================= -->
<main class="bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 py-20">

<div class="max-w-7xl mx-auto px-6">

<div class="grid lg:grid-cols-2 gap-12 bg-slate-900 border border-cyan-500/20 rounded-3xl shadow-2xl overflow-hidden">

    <!-- IMAGEN -->
    <div class="p-6 flex items-center justify-center bg-slate-950">

    <img
        src="{{ $product->image }}"
        alt="{{ $product->name }}"
        class="w-full max-w-2xl max-h-[450px] object-contain transition duration-500 hover:scale-110">

</div>

    <!-- INFORMACIÓN -->
    <div class="p-10">

        <h2 class="text-5xl font-bold text-white mb-3">
            {{ $product->name }}
        </h2>

        <!-- Rating -->
        <div class="flex items-center gap-3 mb-6">

            <div class="text-yellow-400 text-xl">
                ⭐⭐⭐⭐⭐
            </div>

            <span class="text-slate-400">
                4.9 ({{ count($reviews) }} opiniones)
            </span>

        </div>

        <!-- Precio -->
        <p class="text-5xl font-extrabold text-cyan-400 mb-6">
            ${{ number_format($product->price,0,',','.') }}
        </p>

        <!-- Stock -->
        @if($product->stock > 10)

            <span class="inline-block bg-green-600 text-white px-5 py-2 rounded-full font-semibold mb-6">
                ✔ Stock disponible ({{ $product->stock }})
            </span>

        @elseif($product->stock > 0)

            <span class="inline-block bg-yellow-500 text-black px-5 py-2 rounded-full font-semibold mb-6">
                ⚠ Últimas unidades ({{ $product->stock }})
            </span>

        @else

            <span class="inline-block bg-red-600 text-white px-5 py-2 rounded-full font-semibold mb-6">
                ✖ Sin stock
            </span>

        @endif

        <!-- Descripción -->
        <p class="text-slate-300 leading-8 text-lg mb-8">
            {{ $product->description }}
        </p>

        <!-- Beneficios -->
        <div class="space-y-4 border-y border-slate-700 py-6 mb-8">

            <div class="flex items-center gap-4 text-slate-300">

                <i class="fa-solid fa-truck-fast text-cyan-400 text-xl"></i>

                <span>Envíos rápidos a todo Chile.</span>

            </div>

            <div class="flex items-center gap-4 text-slate-300">

                <i class="fa-solid fa-shield-halved text-cyan-400 text-xl"></i>

                <span>Pago 100% seguro mediante Transbank Webpay.</span>

            </div>

            <div class="flex items-center gap-4 text-slate-300">

                <i class="fa-solid fa-medal text-cyan-400 text-xl"></i>

                <span>Productos originales con garantía.</span>

            </div>

        </div>

        <!-- Formulario -->
        <form method="POST" action="/cart/add/{{ $product->id }}">

            @csrf

            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="image" value="{{ $product->image }}">

            <button
                class="w-full py-5 rounded-xl text-xl font-bold text-white
                bg-gradient-to-r from-cyan-500 to-blue-600
                hover:from-blue-600 hover:to-cyan-500
                transition duration-300 shadow-lg">

                🛒 Agregar al carrito

            </button>

        </form>

    </div>

</div>

<!-- ================= OPINIONES ================= -->

<div class="mt-20">

    <h2 class="text-4xl text-white font-bold text-center mb-12">

        ⭐ Opiniones de nuestros clientes

    </h2>

    <div class="space-y-6">

        @foreach($reviews as $review)

        <div class="bg-slate-900 border border-slate-700 rounded-2xl p-6 hover:border-cyan-400 transition">

            <div class="flex justify-between items-center">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-full bg-cyan-500 flex items-center justify-center text-white text-xl font-bold">

                        {{ strtoupper(substr($review['user'],0,1)) }}

                    </div>

                    <div>

                        <h3 class="text-white font-bold text-lg">

                            {{ $review['user'] }}

                        </h3>

                        <div class="text-yellow-400">

                            {{ str_repeat('⭐',$review['rating']) }}

                        </div>

                    </div>

                </div>

            </div>

            <p class="text-slate-300 mt-5 leading-7">

                {{ $review['comment'] }}

            </p>

        </div>

        @endforeach

    </div>

</div>

</div>

</main>

@endsection