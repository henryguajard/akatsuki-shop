@extends('layouts.app')

@section('title', 'Resultado del Pago')

@section('content')

<!-- CABECERA -->
<section class="bg-gradient-to-r from-black to-gray-800 text-white py-14">

    <div class="max-w-6xl mx-auto px-6 text-center">

        @if($estado == 'aprobada')

            <div class="text-6xl mb-4">✅</div>

            <h1 class="text-4xl font-bold">
                ¡Pago realizado con éxito!
            </h1>

            <p class="mt-3 text-gray-300">
                Gracias por comprar en Akatsuki Shop.
            </p>

        @else

            <div class="text-6xl mb-4">❌</div>

            <h1 class="text-4xl font-bold">
                No fue posible completar el pago
            </h1>

            <p class="mt-3 text-gray-300">
                Intenta nuevamente o utiliza otro medio de pago.
            </p>

        @endif

    </div>

</section>

<!-- DETALLE -->
<section class="max-w-5xl mx-auto px-6 py-14">

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        <!-- Encabezado -->
        <div class="bg-gray-100 px-8 py-5 border-b">

            <h2 class="text-2xl font-bold">
                Detalle de la transacción
            </h2>

        </div>

        <!-- Información -->
        <div class="p-8 grid md:grid-cols-2 gap-8">

            <div>

                <h3 class="font-semibold text-gray-500 mb-2">
                    Número de Orden
                </h3>

                <p class="text-xl font-bold">
                    {{ $buy_order }}
                </p>

            </div>

            <div>

                <h3 class="font-semibold text-gray-500 mb-2">
                    Estado
                </h3>

                @if($estado == 'aprobada')

                    <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                        Aprobada
                    </span>

                @else

                    <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full font-semibold">
                        Rechazada
                    </span>

                @endif

            </div>

            <div>

                <h3 class="font-semibold text-gray-500 mb-2">
                    Total Pagado
                </h3>

                <p class="text-3xl font-bold text-blue-600">
                    ${{ number_format($amount,0,',','.') }}
                </p>

            </div>

            <div>

                <h3 class="font-semibold text-gray-500 mb-2">
                    Fecha
                </h3>

                <p>
                    {{ now()->format('d/m/Y H:i') }}
                </p>

            </div>

        </div>

    </div>

    <!-- BOTONES -->
    <div class="flex flex-col md:flex-row justify-center gap-4 mt-10">

        <a href="/">

            <button class="bg-black hover:bg-gray-800 text-white px-8 py-4 rounded-lg font-semibold transition">
                🏠 Volver al inicio
            </button>

        </a>

        @if($estado != 'aprobada')

            <a href="/checkout">

                <button class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-lg font-semibold transition">
                    🔄 Intentar nuevamente
                </button>

            </a>

        @endif

    </div>

</section>

@endsection