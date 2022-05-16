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

            $table->string('codigo_barra', 30)->nullable();
            $table->string('nombre', 90); // not null
            $table->longText('descripcion')->nullable();
            $table->decimal('costo', 10,2); // not null
            $table->decimal('precio', 10,2); // not null
            $table->integer('stock'); // not null
            $table->integer('alerta'); // not null  
            $table->enum('estado', ['activo', 'bloqueado', 'eliminado'])->default('activo');

            $table->timestamps();

            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');

            $table->unsignedBigInteger('talla_id');
            $table->foreign('talla_id')->references('id')->on('tallas');

            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
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
