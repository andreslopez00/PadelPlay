<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['court_id', 'time_slot'];

    // Relación con las pistas
    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
