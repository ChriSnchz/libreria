<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenesArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_id')->nullable()->unsigned();
            $table->integer('articulo_id')->nullable()->unsigned();
            $table->integer('cantidad')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('orden_id')->references('id')->on('ordens')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('articulo_id')->references('id')->on('articulos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_articulos');
    }
}
