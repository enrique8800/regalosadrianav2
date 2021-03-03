<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
           
            $table->string('nombre')->unique();
            $table->string('codigo')->unique()->nullable();
            $table->integer('stock')->default('10');
            $table->string('descripcion');
            $table->string('imagen');
            $table->decimal('precioVenta', 12,2);
            $table->enum('estado',['ACTIVADO', 'DESACTIVADO'])->default('ACTIVADO');
            
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedBigInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
