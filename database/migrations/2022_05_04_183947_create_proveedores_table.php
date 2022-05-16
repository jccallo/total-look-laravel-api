<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_completo', 90); // not null
            $table->string('ruc', 15)->unique(); // not null
            $table->string('email', 90)->unique(); // not null
            $table->string('telefono', 15)->unique(); // not null
            $table->string('direccion', 90); // not null
            $table->string('imagen', 255)->nullable();
            $table->enum('estado', ['activo', 'bloqueado', 'eliminado'])->default('activo');

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
        Schema::dropIfExists('proveedores');
    }
}
