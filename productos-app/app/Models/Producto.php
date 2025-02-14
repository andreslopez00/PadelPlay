<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model {
    use HasFactory;

    protected $table = 'productos';

    // Permitir solo los atributos que queremos guardar
    protected $fillable = ['nombre', 'descripcion', 'precio'];
}
