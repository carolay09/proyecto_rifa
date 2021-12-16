<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRafflesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raffles', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidadPart');
            $table->date('fechaSorteo');
            $table->float('precioTicket');
            $table->unsignedBigInteger('idProducto');
            $table->unsignedBigInteger('idWinner')->nullable();
            $table->unsignedBigInteger('idEstado');
            $table->string('link');
            $table->timestamps();

            $table->foreign('idEstado')->references('id')->on('states')
                ->onDelete('cascade');
            $table->foreign('idProducto')->references('id')->on('products')
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
        Schema::dropIfExists('raffles');
    }
}
