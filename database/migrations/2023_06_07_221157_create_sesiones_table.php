<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesiones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo')->unsigned()->notnull();
            $table->string('no_sesion')->notnull();
            $table->string('descripcion')->notnull();
            $table->date('fecha')->notnull();
            $table->string('status')->notnull();
            $table->timestamps();

            $table->foreign('id_tipo')->references('id')->on('tipos')
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
        Schema::dropIfExists('sesiones');
    }
}
