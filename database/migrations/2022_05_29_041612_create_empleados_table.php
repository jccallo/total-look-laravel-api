<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 45); // not null
            $table->string('apellido', 45); // not null
            $table->string('dni', 30)->unique(); // not null
            $table->string('telefono', 30)->unique(); // not null
            $table->string('direccion', 90); // not null
            $table->string('imagen', 255); // not null
            $table->enum('estado', ['activo', 'eliminado'])->default('activo'); // not null
            $table->string('email', 90)->unique(); // not null
            $table->string('password', 255); // not null

            $table->timestamps();

            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
