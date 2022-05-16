<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_compras', function (Blueprint $table) {
            $table->id();

            $table->integer('cantidad');
            $table->decimal('total', 10,2);
            $table->date('fecha_ingreso');
            $table->enum('tipo_pago', ['efectivo', 'tarjeta', 'monedero'])->default('efectivo');
            $table->enum('estado_pago', ['pagado', 'pendiente', 'cancelado'])->default('pendiente');
            $table->enum('estado', ['activo', 'bloqueado', 'eliminado'])->default('activo');

            $table->timestamps();

            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_compras');
    }
}
