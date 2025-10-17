<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComisionDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comision_detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->unsigned()->notnull();
            $table->integer('id_cargo')->unsigned()->notnull();
            $table->string('status')->notnull();
            $table->integer('user_modifi')->notnull();
            $table->timestamps();

            $table->foreign('id_cargo')->references('id')->on('cargos')
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
        Schema::dropIfExists('comision_detalles');
    }
}
