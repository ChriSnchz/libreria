<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tipo_articulo',40)->nullable();
            $table->char('titulo',40)->nullable();
            $table->char('autor',40)->nullable();
            $table->char('editorial',40)->nullable();
            $table->char('genero',40)->nullable();
            $table->float('costo')->nullable()->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
