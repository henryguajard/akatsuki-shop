<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Akatsuki Shop')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    @include('partials.navbar')

    @include('partials.cart-sidebar')

    <main class="pt-24">
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        function toggleCart() {
            const sidebar = document.getElementById('cartSidebar');
            const overlay = document.getElementById('cartOverlay');

            sidebar.classList.toggle('translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>

</body>
</html>