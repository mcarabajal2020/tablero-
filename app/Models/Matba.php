<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matba extends Model
{
    protected $fillable = [
        'producto_contrato',
        'precio',
        'precio_compra',
        'precio_venta',
    ];
}
