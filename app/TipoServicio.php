<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $table="tipo_servicio";
    
    public function cuentasCobro()
    {
        return $this->hasMany('App\CuentaCobro');
    }
}
