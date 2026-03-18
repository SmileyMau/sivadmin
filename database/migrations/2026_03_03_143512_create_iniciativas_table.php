<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIniciativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iniciativas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sesion')->unsigned()->notnull();
            $table->integer('id_user')->unsigned()->notnull();
            $table->integer('id_tipo_iniciativa')->unsigned()->notnull();
            $table->string('archivo')->notnull();
            $table->string('status')->notnull();
            $table->string('user_modifi')->notnull();
            $table->timestamps();

            $table->foreign('id_sesion')->references('id')->on('sesiones')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('id_tipo_iniciativa')->references('id')->on('tipo_iniciativas')
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
        Schema::dropIfExists('iniciativas');
    }
}
