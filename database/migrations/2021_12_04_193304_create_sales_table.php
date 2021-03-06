<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha')->nullable();
            $table->float('total')->nullable();
            $table->string('nroOperacion')->nullable();
            $table->unsignedBigInteger('idEstado');
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idCupon')->nullable();
            $table->timestamps();

            $table->foreign('idEstado')->references('id')->on('states')
                ->onDelete('cascade');
            $table->foreign('idUsuario')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idCupon')->references('id')->on('coupons')
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
        Schema::dropIfExists('sales');
    }
}
