<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcuerdoJuntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acuerdo_juntas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->unsigned()->notnull();
            $table->integer('id_votacion')->unsigned()->notnull();
            $table->string('archivo')->notnull();
            $table->string('status')->notnull();
            $table->string('user_modifi')->notnull();
            $table->timestamps();

            $table->foreign('id_votacion')->references('id')->on('votaciones')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('id_user')->references('id')->on('users')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acuerdo_juntas');
    }
}
