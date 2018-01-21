<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CuentaCobro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_cobro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',9);

            $table->integer('ano_ejecucuion_servicio');
            $table->integer('mes_ejecucuion_servicio');
            $table->integer('numero_ejecucuion_servicio');
            $table->bigInteger('valor_total_numeros');
            $table->text('valor_total_letras');

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade');

            $table->integer('tipo_servicio_id')->unsigned();
            $table->foreign('tipo_servicio_id')->references('id')->on('tipo_servicio')->onDelete('cascade');

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
        Schema::dropIfExists('cuenta_cobro');
    }
}
