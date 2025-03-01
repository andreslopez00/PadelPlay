<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;

class CourtPublicController extends Controller
{
    public function index()
    {
        $courts = Court::all(); // Obtener todas las pistas desde la base de datos
        return view('services', compact('courts'));
    }

    public function up()
{
    Schema::table('courts', function (Blueprint $table) {
        $table->string('image')->nullable()->after('price'); // Campo para almacenar la imagen
    });
}

public function down()
{
    Schema::table('courts', function (Blueprint $table) {
        $table->dropColumn('image');
    });
}

}
