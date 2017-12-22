<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Concepto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepto', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('valor_numeros');
            $table->text('valor_letras');
            $table->text('descripcion');
            
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
        Schema::dropIfExists('concepto');
    }
}
