<!-- NAVBAR RESPONSIVE -->
<header class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-md shadow-md z-50">
    @php
        $cart = session('cart', []);
        $cartCount = collect($cart)->sum('qty');
    @endphp

    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 md:px-8 py-4">

        <!-- LOGO -->
        <a href="/" class="flex items-center gap-3">
            <img src="/img/logo-akatsuki.jpg"
                 alt="Akatsuki Shop Logo"
                 class="h-12 md:h-14 w-auto object-contain">

            <span class="text-lg md:text-2xl font-bold tracking-wide">
                Akatsuki Shop
            </span>
        </a>

        <!-- DESKTOP MENU -->
        <nav class="hidden md:flex gap-6 items-center">

            <a href="#products"
               class="hover:text-red-600 font-medium transition">
                Productos
            </a>

            <a href="#benefits"
               class="hover:text-red-600 font-medium transition">
                Beneficios
            </a>

            <!-- CARRITO -->
            <button onclick="toggleCart()"
                class="bg-black text-white px-4 py-2 rounded flex items-center gap-2 relative hover:bg-gray-800 transition">

                🛒

                @if($cartCount > 0)
                    <span class="bg-red-600 text-white text-xs font-bold rounded-full px-2 py-1 absolute -top-2 -right-2">
                        {{ $cartCount }}
                    </span>
                @endif

            </button>

        </nav>

        <!-- MOBILE BUTTONS -->
        <div class="flex items-center gap-3 md:hidden">

            <!-- CART -->
            <button onclick="toggleCart()"
                class="bg-black text-white px-3 py-2 rounded relative">

                🛒

                @if($cartCount > 0)
                    <span class="bg-red-600 text-white text-xs font-bold rounded-full px-2 py-1 absolute -top-2 -right-2">
                        {{ $cartCount }}
                    </span>
                @endif

            </button>

            <!-- HAMBURGER -->
            <button onclick="toggleMobileMenu()"
                class="text-3xl text-black">
                ☰
            </button>

        </div>

    </div>

    <!-- MOBILE MENU -->
    <div id="mobileMenu"
         class="hidden md:hidden bg-white border-t shadow-lg">

        <nav class="flex flex-col p-4 gap-4">

            <a href="#products"
               onclick="toggleMobileMenu()"
               class="hover:text-red-600 font-medium">
                Productos
            </a>

            <a href="#benefits"
               onclick="toggleMobileMenu()"
               class="hover:text-red-600 font-medium">
                Beneficios
            </a>

            <a href="/"
               class="hover:text-red-600 font-medium">
                Inicio
            </a>

        </nav>

    </div>

</header>

<!-- SCRIPT MENU MÓVIL -->
<script>
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    }
</script>