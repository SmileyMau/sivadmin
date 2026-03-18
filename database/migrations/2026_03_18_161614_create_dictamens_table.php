<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictamens', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->unsigned()->notnull();
            $table->integer('id_sesion_detalle')->unsigned()->notnull();
            $table->string('archivo')->notnull();
            $table->string('status')->notnull();
            $table->string('user_modifi')->notnull();
            $table->timestamps();

            $table->foreign('id_sesion_detalle')->references('id')->on('sesion_dets')
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
        Schema::dropIfExists('dictamens');
    }
}
