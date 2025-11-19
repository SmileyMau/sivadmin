<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsuntoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asunto_detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('id_asunto')->unsigned()->notnull();
            $table->integer('id_user')->unsigned()->notnull();
            $table->string('status')->notnull();
            $table->string('user_modifi')->notnull();
            $table->timestamps();

            $table->foreign('id_asunto')->references('id')->on('asuntos')
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
        Schema::dropIfExists('asunto_detalles');
    }
}
