<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaCobro extends Model
{
    protected $table="cuenta_cobro";

    public function tipoServicio()
    {
        return $this->belongsTo('App\TipoServicio');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function pasajeros()
    {
        return $this->hasMany('App\Pasajero');
    }

    public function conceptos()
    {
        return $this->hasMany('App\Concepto');
    }
}
