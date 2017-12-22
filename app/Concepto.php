<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $table="concepto";

    public function cuentaCobro()
    {
        $this->belongsTo('App\CuentaCobro');
    }
}
