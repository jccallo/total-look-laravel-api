<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesOrdenesPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_ordenes_pedidos', function (Blueprint $table) {
            $table->id();

            $table->integer('cantidad');
            $table->decimal('precio', 10,2);

            $table->timestamps();

            $table->unsignedBigInteger('orden_pedido_id');
            $table->foreign('orden_pedido_id')->references('id')->on('ordenes_pedidos');

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->unique(['orden_pedido_id', 'producto_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_ordenes_pedidos');
    }
}
