<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionAsuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesion_asuntos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sesion')->unsigned()->notnull();
            $table->integer('id_asunto')->unsigned()->notnull();
            $table->integer('orden')->notnull();
            $table->string('status')->notnull();
            $table->string('user_modifi')->notnull();
            $table->timestamps();

            $table->foreign('id_sesion')->references('id')->on('sesiones')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('id_asunto')->references('id')->on('asuntos')
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
        Schema::dropIfExists('sesion_asuntos');
    }
}
