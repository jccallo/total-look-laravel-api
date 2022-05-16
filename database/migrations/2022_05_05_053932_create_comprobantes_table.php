<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();

            $table->enum('tipo_comprobante', ['boleta', 'factura'])->default('boleta');
            $table->string('numero_correlativo', 15);

            $table->timestamps();

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
        Schema::dropIfExists('comprobantes');
    }
}
