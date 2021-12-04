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
            $table->datetime ('fecha');
            $table->float ('subtotal');
            $table->float ('total');
            $table->string ('nroOperación');
            $table->unsignedBigInteger('idEstado');
            $table->unsignedBigInteger('idUsuario');
            $table->timestamps();

            // $table->foreign('idEstado')->references('id')->On('state')
            //     ->onDelete('cascade');
            // $table->foreign('idUsuario')->references('id')->On('users')
            //     ->onDelete('cascade');
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
