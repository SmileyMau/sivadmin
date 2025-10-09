<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionDetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesion_dets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sesion')->unsigned()->notnull();
            $table->string('tipo')->notnull();
            $table->string('no_dictamen')->notnull();
            $table->string('titulo')->notnull();
            $table->string('descripcion')->notnull();
            $table->string('total')->notnull();
            $table->string('status')->notnull();
            $table->timestamps();

            $table->foreign('id_sesion')->references('id')->on('sesiones')
            ->onDelete('restrict')
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
        Schema::dropIfExists('sesion_dets');
    }
}
