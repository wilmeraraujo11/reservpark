<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicacion';

    public function parqueaderos()
    {
    	return $this->hasMany(Parqueadero::class);
    }
}
