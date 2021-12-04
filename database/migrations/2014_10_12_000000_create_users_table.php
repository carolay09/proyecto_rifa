<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('correo')->unique();
            $table->string('clave');
            $table->unsignedBigInteger('idEstado');
            $table->unsignedBigInteger('idRol');
            $table->timestamps();

            $table->foreign('idEstado')->references('id')->On('state')
                ->onDelete('cascate');
                $table->foreign('idRol')->references('id')->On('roles')
                ->onDelete('cascate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
