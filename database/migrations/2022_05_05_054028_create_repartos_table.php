<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repartos', function (Blueprint $table) {
            $table->id();

            $table->date('fecha_entrega');
            $table->enum('horario_entrega', ['mañana', 'tarde', 'noche']);
            $table->string('direccion', 90);

            $table->timestamps();

            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados');

            $table->unsignedBigInteger('orden_pedido_id');
            $table->foreign('orden_pedido_id')->references('id')->on('ordenes_pedidos'); // one to one
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repartos');
    }
}
