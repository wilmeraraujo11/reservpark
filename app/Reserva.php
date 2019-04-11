<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reserva';

    public function parqueadero()
    {
    	return $this->belongsTo(Parqueadero::class);
    }
    public function vehiculo()
    {
    	return $this->belongsTo(Vehiculo::class);
    }
}
