<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('descuento'); 
            $table->integer('cantidad');
            // $table->unsignedBigInteger('idVenta');
            $table->unsignedBigInteger('idEstado');
            $table->timestamps();

            // $table->foreign('idVenta')->references('id')->on('sales')
            //     ->onDelete('cascade');     
            $table->foreign('idEstado')->references('id')->on('states')
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
        Schema::dropIfExists('coupons');
    }
}
