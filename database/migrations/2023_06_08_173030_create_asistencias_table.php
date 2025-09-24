<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->notnull();
            $table->string('id_sesion')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('asistencia')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
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
        Schema::dropIfExists('asistencias');
    }
}
