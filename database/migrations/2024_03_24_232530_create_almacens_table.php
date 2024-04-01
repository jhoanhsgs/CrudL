<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacens', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('stock');
            $table->integer('stock_minimo');
            $table->integer('stock_maximo');
            $table->string('precio_compra');
            $table->string('precio_venta');
            $table->date('fecha_ingreso');
            $table->string('imagen');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categoria_id');

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias')
            ->onDelete('cascade')
            ->onUpdate('cascade');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('almacens');
    }
}
