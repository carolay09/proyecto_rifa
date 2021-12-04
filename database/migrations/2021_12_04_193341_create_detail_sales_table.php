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
            $table->unsignedBigInteger('idVenta');
            $table->unsignedBigInteger('idTicket');
            $table->timestamps();

            $table->foreign('idVenta')->references('id')->On('salesstate')
                ->onDelete('cascate');
            $table->foreign('idTicket')->references('id')->On('raffles')
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
