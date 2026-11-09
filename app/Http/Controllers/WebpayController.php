<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transbank\Webpay\Options;
use Transbank\Webpay\WebpayPlus\Transaction;
use App\Models\Transaccion;

class WebpayController extends Controller
{
    public function iniciarPago()
    {
        try {
            // 🛒 obtener carrito
            $cart = session('cart', []);

            if (empty($cart)) {
                return redirect('/')->with('error', 'Carrito vacío');
            }

            // 💰 calcular total del carrito
            $amount = collect($cart)->sum(function ($item) {
                return $item['price'] * $item['qty'];
            });

            $buyOrder  = 'orden_' . time();
            $sessionId = session()->getId();

            // 🌐 URL pública ngrok
            $returnUrl = route('webpay.respuesta');

            // 🔐 credenciales sandbox
            $options = new Options(
                '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C',
                '597055555532',
                Options::ENVIRONMENT_INTEGRATION
            );

            $transaction = new Transaction($options);

            $response = $transaction->create(
                $buyOrder,
                $sessionId,
                $amount,
                $returnUrl
            );

            // 💾 guardar orden en BD
            Transaccion::create([
                'buy_order'  => $buyOrder,
                'session_id' => $sessionId,
                'amount'     => $amount,
                'token_ws'   => $response->getToken(),
                'url'        => $response->getUrl(),
                'estado'     => 'iniciada',
            ]);

            // 🔁 redirección a Webpay
            return redirect()->away(
                $response->getUrl() . '?token_ws=' . $response->getToken()
            );

        } catch (\Exception $e) {
            dd('ERROR CREATE: ' . $e->getMessage());
        }
    }

    public function respuesta(Request $request)
    {
        $token = $request->input('token_ws');

        if (!$token) {
            return redirect('/')->withErrors('Token inválido');
        }

        try {
            $options = new Options(
                '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C',
                '597055555532',
                Options::ENVIRONMENT_INTEGRATION
            );

            $transaction = new Transaction($options);

            $commitResponse = $transaction->commit($token);

        } catch (\Exception $e) {
            dd('ERROR COMMIT: ' . $e->getMessage());
        }

        // 🔎 buscar orden
        $transaccion = Transaccion::where('token_ws', $token)->first();

        if ($transaccion) {

            $estado = $commitResponse->getResponseCode() === 0
                ? 'aprobada'
                : 'rechazada';

            $transaccion->update([
                'estado'  => $estado,
                'detalle' => json_encode([
                    'buy_order'          => $commitResponse->getBuyOrder(),
                    'amount'             => $commitResponse->getAmount(),
                    'authorization_code' => $commitResponse->getAuthorizationCode(),
                    'payment_type_code'  => $commitResponse->getPaymentTypeCode(),
                    'response_code'      => $commitResponse->getResponseCode(),
                ]),
            ]);
        }

                    if (($transaccion->estado ?? null) === 'aprobada') {
                          session()->forget('cart');


                       }else {

                    $transaccion->update([
                     'estado' => 'rechazada',
                      ]);
                        }

        // 🎯 vista resultado
        return view('webpay.resultado', [
            'estado'    => $transaccion->estado ?? 'desconocido',
            'buy_order' => $commitResponse->getBuyOrder(),
            'amount'    => $commitResponse->getAmount(),

        ]);
    }
}