<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->string('buy_order');
            $table->string('session_id');
            $table->integer('amount');
            $table->string('token_ws');
            $table->string('url');
            $table->string('estado')->default('iniciada'); // iniciada, aprobada, rechazada
            $table->text('detalle')->nullable(); // respuesta completa de Webpay
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaccions');
    }
};
