<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoAcademTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_academ', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ciclo');
            $table->char('situacion', 1)->nullable();
            $table->float('promedio', 5, 2);
            $table->string('anho_ingreso', 4);
            $table->string('estado_permanencia')->nullable();
            $table->integer('total_creditos')->nullable();
            
            $table->integer('id_alumno')->unsigned()->unique();

            $table->foreign('id_alumno')->references('id')->on('alumnos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_academ');
    }
}
