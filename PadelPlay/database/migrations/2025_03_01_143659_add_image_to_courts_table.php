<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('courts', function (Blueprint $table) {
            $table->string('image')->nullable()->after('price'); // Agrega la columna después del campo 'price'
        });
    }

    public function down()
    {
        Schema::table('courts', function (Blueprint $table) {
            $table->dropColumn('image'); // Permite revertir la migración
        });
    }
};

