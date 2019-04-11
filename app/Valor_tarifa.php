<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valor_tarifa extends Model
{
    protected $table = 'valor_tarifa';

    public function tarifas()
	{
		return $this->hasMany(Tarifa::class);
	}
}
