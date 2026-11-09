@extends('layouts.app')

@section('title', 'Inicio | Akatsuki Shop')

@section('content')

<!-- HERO -->
<section class="text-center py-24 bg-gray-50">
    <h2 class="text-5xl font-bold mb-4">
        Tecnología que mejora tu vida
    </h2>

    <p class="text-gray-600 mb-6">
        Ecommerce demo tipo Shopify integrado con Laravel + Transbank
    </p>

    <a href="#products" class="bg-black text-white px-6 py-3 rounded">
        Ver productos
    </a>
</section>

<!-- ================= BENEFICIOS ================= -->
<section id="benefits" class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-gray-800">
                ¿Por qué comprar en <span class="text-cyan-500">Akatsuki Shop</span>?
            </h2>

            <p class="text-gray-500 mt-3">
                Nos preocupamos por brindarte la mejor experiencia de compra.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center transition duration-300 hover:-translate-y-3 hover:shadow-2xl">

                <div class="w-20 h-20 mx-auto mb-6 flex items-center justify-center rounded-full bg-cyan-100 text-5xl">
                    🚚
                </div>

                <h3 class="text-2xl font-bold mb-3">
                    Envíos Rápidos
                </h3>

                <p class="text-gray-500">
                    Despachamos a todo Chile con seguimiento de tu compra y tiempos de entrega rápidos.
                </p>

            </div>

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center transition duration-300 hover:-translate-y-3 hover:shadow-2xl">

                <div class="w-20 h-20 mx-auto mb-6 flex items-center justify-center rounded-full bg-green-100 text-5xl">
                    🔒
                </div>

                <h3 class="text-2xl font-bold mb-3">
                    Pago Seguro
                </h3>

                <p class="text-gray-500">
                    Compra con confianza mediante Transbank Webpay y protege cada una de tus transacciones.
                </p>

            </div>

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center transition duration-300 hover:-translate-y-3 hover:shadow-2xl">

                <div class="w-20 h-20 mx-auto mb-6 flex items-center justify-center rounded-full bg-yellow-100 text-5xl">
                    ⭐
                </div>

                <h3 class="text-2xl font-bold mb-3">
                    Calidad Garantizada
                </h3>

                <p class="text-gray-500">
                    Seleccionamos productos de alto rendimiento para gamers y entusiastas de la tecnología.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- PRODUCTOS -->
<section id="products" class="px-10 py-16">

    <h2 class="text-3xl font-bold mb-8">Productos destacados</h2>

    <div class="grid md:grid-cols-4 gap-6">

        @foreach($products as $product)

        <div class="border rounded-lg p-4 bg-white shadow hover:shadow-xl transition">

            <!-- Imagen -->
            <a href="/product/{{ $product->id }}">
                <img
                    src="{{ $product->image }}"
                    alt="{{ $product->name }}"
                    class="h-40 w-full object-cover rounded mb-4 hover:scale-105 transition duration-300">
            </a>

            <!-- Nombre -->
            <h3 class="font-bold text-lg">
                {{ $product->name }}
            </h3>

            <!-- Precio -->
            <p class="text-gray-600 mb-3">
                ${{ number_format($product->price,0,',','.') }}
            </p>

            <!-- Stock -->
            <p class="text-sm text-green-600 mb-3">
                Stock disponible: {{ $product->stock }}
            </p>

            <!-- Botón -->
            <form method="POST" action="/cart/add/{{ $product->id }}">
                @csrf

                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="image" value="{{ $product->image }}">

                <button
                    class="w-full bg-black hover:bg-red-600 text-white py-2 rounded transition">
                    Agregar al carrito
                </button>
            </form>

        </div>

        @endforeach

    </div>

</section>


@endsection

