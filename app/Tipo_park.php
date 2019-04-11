<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_park extends Model
{
    protected $table = 'tipo_park';

    public function parqueaderos()
    {
    	return $this->hasMany(Parqueadero::class);
    }
}
