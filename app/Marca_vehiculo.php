<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca_vehiculo extends Model
{
    protected $table = 'marca_vehiculo';
    //cuando cuando una marca tiene muchso vehiculos ´por convención se coloca el metoso en 
    //plural ej: vehiculos
    public function vehiculos()
    {
    	return $this->hasMany(Vehiculo::class);
    }
}
