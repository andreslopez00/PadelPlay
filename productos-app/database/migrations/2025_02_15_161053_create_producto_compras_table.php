<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoComprasTable extends Migration
{
    public function up()
{
    Schema::create('producto_compras', function (Blueprint $table) {
        $table->id();
        $table->foreignId('compra_id')->constrained('compras')->onDelete('cascade');
        $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
        $table->integer('cantidad');
        $table->decimal('precio', 10, 2);
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('producto_compras');
    }
}
