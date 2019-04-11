<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_vehiculo extends Model
{
    protected $table = 'tipo_vehiculo';
    /*protected $fillable = [
        'nombre', 'marca', 'color', 'id_tipo_vehiculo', 'parqueadero_id',
    ];*/
    public function vehiculos()
    {
    	return $this->hasMany(Vehiculo::class);
    }
}
