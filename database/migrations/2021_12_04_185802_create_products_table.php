<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('marca');
            $table->string('imagen');
            $table->string('detalle');
            $table->float('precio');
            $table->unsignedBigInteger('idEstado');
            $table->unsignedBigInteger('idCategoria');
            $table->timestamps();

            $table->foreign('idEstado')->references('id')->on('state')
                ->onDelete('cascade');
            $table->foreign('idCategoria')->references('id')->on('category')
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
        Schema::dropIfExists('products');
    }
}
