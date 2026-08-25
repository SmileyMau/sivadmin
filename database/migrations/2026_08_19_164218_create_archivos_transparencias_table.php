<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTransparenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_transparencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sesion')->unsigned();
            $table->integer('id_tipo_archivo')->unsigned();
            $table->string('archivo', 255);
            $table->string('descripcion', 255);
            $table->timestamps();

            $table->foreign('id_sesion')->references('id')->on('sesiones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tipo_archivo')->references('id')->on('tipo_archivo_transparencias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos_transparencias');
    }
}
