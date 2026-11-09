<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <header class="bg-black text-white py-6 shadow">
        <div class="max-w-6xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold">🛒 Tu Carrito</h1>

            <a href="/" class="bg-white text-black px-4 py-2 rounded hover:bg-gray-200 transition">
                ← Volver al sitio
            </a>
        </div>
    </header>

    <!-- CONTENIDO -->
    <main class="max-w-5xl mx-auto px-6 py-10">

        @if(count($cart) > 0)

            @php $total = 0; @endphp

            <div class="space-y-6">

                @foreach($cart as $item)

                    @php
                        $subtotal = $item['price'] * $item['qty'];
                        $total += $subtotal;
                    @endphp

                    <div class="bg-white rounded-lg shadow p-6 flex flex-col md:flex-row md:justify-between md:items-center gap-6">

    <!-- IMAGEN -->
    <div class="w-24 h-24 ">
        <img src="{{ $item['image'] }}" class="w-full h-full object-cover rounded">
    </div>

    <!-- INFO PRODUCTO -->
    <div class="flex-1">
        <h2 class="text-xl font-bold mb-2">{{ $item['name'] }}</h2>
        <p class="text-gray-600">Precio: ${{ number_format($item['price'], 0, ',', '.') }}</p>
        <p class="text-gray-600">Cantidad: {{ $item['qty'] }}</p>
        <p class="text-lg font-semibold text-blue-600 mt-2">
            Subtotal: ${{ number_format($subtotal, 0, ',', '.') }}
        </p>
    </div>

    <!-- BOTONES -->
    <div class="flex gap-2">

                            <!-- Aumentar -->
                            <form action="/cart/increase/{{ $item['id'] }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                                    ➕
                                </button>
                            </form>

                            <!-- Disminuir -->
                            <form action="/cart/decrease/{{ $item['id'] }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                                    ➖
                                </button>
                            </form>

                            <!-- Eliminar -->
                            <form action="/cart/remove/{{ $item['id'] }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                    🗑️
                                </button>
                            </form>

                        </div>
                    </div>

                @endforeach

            </div>

            <!-- TOTAL -->
            <div class="bg-white rounded-lg shadow mt-10 p-6 text-center">
                <h3 class="text-3xl font-bold mb-4">
                    Total: ${{ number_format($total, 0, ',', '.') }}
                </h3>

                <a href="/checkout">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded text-lg font-bold transition">
                        Pagar con Transbank
                    </button>
                </a>
            </div>

        @else

            <!-- CARRITO VACÍO -->
            <div class="bg-white rounded-lg shadow p-10 text-center">
                <h2 class="text-2xl font-bold mb-4">Tu carrito está vacío 🛒</h2>
                <p class="text-gray-600 mb-6">Agrega productos para comenzar tu compra.</p>

                <a href="/">
                    <button class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded">
                        Ver productos
                    </button>
                </a>
            </div>

        @endif

    </main>

</body>
</html>