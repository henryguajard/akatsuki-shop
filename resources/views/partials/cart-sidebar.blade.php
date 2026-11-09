<!-- OVERLAY -->
<div id="cartOverlay"
     class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"
     onclick="toggleCart()">
</div>

<!-- SIDEBAR -->
<div id="cartSidebar"
     class="fixed top-0 right-0 w-full md:w-[450px] h-full bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-50 overflow-y-auto">

    <div class="p-6 border-b flex justify-between items-center">
        <h2 class="text-2xl font-bold">🛒 Carrito</h2>

        <button onclick="toggleCart()" class="text-2xl">
            ✕
        </button>
    </div>

    <div class="p-6">

        @php $total = 0; @endphp

        @foreach(session('cart', []) as $item)

            @php
                $subtotal = $item['price'] * $item['qty'];
                $total += $subtotal;
            @endphp

            <div class="flex gap-4 border-b pb-4 mb-4">

                <!-- IMAGEN -->
                <img src="{{ $item['image'] ?? '/img/default.png' }}"
                     class="w-20 h-20 object-cover rounded">

                <!-- INFO -->
                <div class="flex-1">
                    <h3 class="font-bold">{{ $item['name'] }}</h3>

                    <p class="text-gray-500">
                        {{ $item['qty'] }} x ${{ number_format($item['price'], 0, ',', '.') }}
                    </p>

                    <p class="font-bold text-blue-600">
                        ${{ number_format($subtotal, 0, ',', '.') }}
                    </p>

                    <!-- CONTROLES -->
                    <div class="flex gap-2 mt-2">

                        <form action="/cart/increase/{{ $item['id'] }}" method="POST">
                            @csrf
                            <button class="px-2 py-1 bg-black text-white rounded">+</button>
                        </form>

                        <form action="/cart/decrease/{{ $item['id'] }}" method="POST">
                            @csrf
                            <button class="px-2 py-1 bg-black text-white rounded">-</button>
                        </form>

                        <form action="/cart/remove/{{ $item['id'] }}" method="POST">
                            @csrf
                            <button class="px-2 py-1 bg-black text-white rounded">🗑</button>
                        </form>

                    </div>
                </div>
            </div>

        @endforeach

        <!-- TOTAL -->
        <div class="mt-8">
            <h3 class="text-2xl font-bold mb-4">
                Total: ${{ number_format($total, 0, ',', '.') }}
            </h3>

            <a href="/checkout">
                <button class="w-full bg-black text-white py-4 rounded text-lg font-bold">
                    PAGAR
                </button>
            </a>
        </div>

    </div>
</div>