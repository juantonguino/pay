<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pasajero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajero', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->text('tipo_identificacion');
            $table->text('identificacion');
            $table->date('fecha_nacimiento');

            $table->integer('cuenta_cobro_id')->unsigned();
            $table->foreign('cuenta_cobro_id')->references('id')->on('cuenta_cobro')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasajero');
    }
}
