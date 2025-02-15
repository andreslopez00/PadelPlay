<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoCompra extends Model
{
    protected $fillable = ['compra_id', 'producto_id', 'cantidad', 'precio'];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}

