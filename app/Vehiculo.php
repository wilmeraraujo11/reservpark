<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculo';

    public function marca_vehiculo()
    {
    	return $this->belongsTo(Marca_vehiculo::class, 'id_marca');
    }
    public function tipo_vehiculo()
    {
    	return $this->belongsTo(Tipo_vehiculo::class, 'id_tipo_vehiculo');
    }
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
    public function ingresos_vehiculos()
    {
        return $this->hasMany(Ingreso_vehiculo::class);
    }
}
 