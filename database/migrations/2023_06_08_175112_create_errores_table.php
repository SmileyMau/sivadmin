<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErroresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('errores', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('error',10000);
            $table->string('fecha');
            $table->string('id_user');
            $table->string('nombre');
            $table->string('archivo');
            $table->string('nota');
            $table->integer('linea');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('errores');
    }
}
