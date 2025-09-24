<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->notnull();
            $table->integer('id_dictamen')->unsigned()->notnull();
            $table->string('fecha')->nullable();
            $table->string('votacion')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_dictamen')->references('id')->on('sesion_dets')
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
        Schema::dropIfExists('votaciones');
    }
}
