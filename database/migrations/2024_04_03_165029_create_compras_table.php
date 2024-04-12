<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->string('nro_compra');
            $table->date('fecha_compra');
            $table->unsignedBigInteger('id_proveedor');
            $table->string('comprobante');
            $table->unsignedBigInteger('id_usuario');
            $table->string('precio_compra',50);
            $table->integer('cantidad');

            $table->timestamps();

            $table->foreign('id_producto')
            ->references('id')
            ->on('almacens')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_proveedor')
            ->references('id')
            ->on('proveedores')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_usuario')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('compras');
    }
};
