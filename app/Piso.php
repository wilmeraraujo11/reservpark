<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    protected $table = 'piso';
	
	public function parqueadero()
    {
    	return $this->belongsTo(Parqueadero::class);
    }
    public function cupos()
	{
		return $this->hasMany(Cupo::class);
	}
}
