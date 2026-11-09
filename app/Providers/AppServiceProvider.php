<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Transbank\Webpay\WebpayPlus\WebpayPlus;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ✅ CONFIGURACIÓN OFICIAL WEBPAY INTEGRACIÓN
       
    }
}
