<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_pedidos', function (Blueprint $table) {
            $table->id();

            $table->integer('cantidad');
            $table->decimal('total', 10,2);
            $table->decimal('recibido', 10,2);
            $table->decimal('cambio', 10,2);
            $table->enum('tipo_pago', ['efectivo', 'tarjeta', 'monedero'])->default('efectivo');
            $table->enum('tipo_entrega', ['tienda', 'reparto'])->default('tienda');
            $table->enum('estado_pago', ['pagado', 'pendiente', 'cancelado'])->default('pagado');
            $table->enum('estado', ['activo', 'bloqueado', 'eliminado'])->default('activo');

            $table->timestamps();

            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_pedidos');
    }
}
