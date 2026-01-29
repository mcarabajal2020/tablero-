<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dolar extends Model
{
    protected $fillable = [
        'tipo',
        'compra',
        'venta',
        'actualizado_api',
    ];

    protected $casts = [
        'actualizado_api' => 'datetime',
    ];
}