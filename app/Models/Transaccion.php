<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'buy_order',
        'session_id',
        'amount',
        'token_ws',
        'url',
        'estado',
        'detalle',
    ];
}

