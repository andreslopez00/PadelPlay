<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('courts', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->change(); // Permite hasta 9999999999.99
        });
    }

    public function down()
    {
        Schema::table('courts', function (Blueprint $table) {
            $table->integer('price')->change(); // Revertir si es necesario
        });
    }
};
