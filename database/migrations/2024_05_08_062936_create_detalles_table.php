<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nro_venta');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('nro_venta')
                ->references('nro_venta')
                ->on('ventas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_producto')
                ->references('id')
                ->on('almacens')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalles');
    }
}
;
