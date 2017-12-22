<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table="cliente";

    public function cuentasCobro()
    {
        return $this->hasMany('App\CuentaCobro');
    }
}
