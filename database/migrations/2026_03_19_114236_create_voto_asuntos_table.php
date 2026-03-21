<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotoAsuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voto_asuntos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->notnull();
            $table->integer('id_sesion_asunto')->unsigned()->notnull();
            $table->string('fecha')->nullable();
            $table->string('votacion')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_sesion_asunto')->references('id')->on('sesion_asuntos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voto_asuntos');
    }
}
