<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso_vehiculo extends Model
{
    protected $table = 'ingreso_vehiculo';

    public function parqueadero()
    {
    	return $this->belongsTo(Parqueadero::class, 'id_parqueadero');
    }
    public function vehiculo()
    {
    	return $this->belongsTo(Vehiculo::class);
    }
}
