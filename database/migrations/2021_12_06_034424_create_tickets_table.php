<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('nroTicket');
            $table->unsignedBigInteger('idRifa');
            $table->unsignedBigInteger('idUsuario');
            $table->timestamps();

            $table->foreign('idRifa')->references('id')->on('raffles')
                ->onDelete('cascade');
            $table->foreign('idUsuario')->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
