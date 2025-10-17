<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asuntos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->notnull();
            $table->integer('id_tipo')->unsigned()->notnull();
            $table->date('fecha')->notnull();
            $table->string('descripcion')->notnull();
            $table->string('no_oficio')->notnull();
            $table->string('observacion')->notnull();
            $table->string('status')->notnull();
            $table->string('user_modifi')->notnull();
            $table->timestamps();

            
            $table->foreign('id_tipo')->references('id')->on('tipo_asuntos')
            ->onDelete('restrict')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('asuntos');
    }
}
