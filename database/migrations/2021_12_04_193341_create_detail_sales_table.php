<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_sales', function (Blueprint $table) {
            $table->id();
            $table->int ('cantidad');
            $table->float ('precio');
            $table->float ('total');
            $table->unsignedBigInteger('idEstado');
            $table->unsignedBigInteger('idUsuario');
            $table->timestamps();

            $table->foreign('idEstado')->references('id')->On('state')
                ->onDelete('cascate');
            $table->foreign('idUsuario')->references('id')->On('users')
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
        Schema::dropIfExists('detail_sales');
    }
}
