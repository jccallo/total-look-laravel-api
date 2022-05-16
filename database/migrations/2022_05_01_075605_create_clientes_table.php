<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_completo', 90); // not null
            $table->enum('tipo_documento', ['dni', 'ruc'])->default('dni');
            $table->string('numero_documento', 15)->unique(); // not null
            $table->string('telefono', 15)->unique()->nullable();
            $table->string('direccion', 90)->nullable();
            $table->string('imagen', 255)->nullable();
            $table->enum('estado', ['activo', 'bloqueado', 'eliminado'])->default('activo');
            $table->string('email', 90)->unique()->nullable();
            $table->string('password', 255)->nullable();
            
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
        Schema::dropIfExists('clientes');
    }
}
