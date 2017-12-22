<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    protected $table="pasajero";

    public function cuentaCobro()
    {
        return $this->belongsTo('App\CuentaCobro');
    }
}
