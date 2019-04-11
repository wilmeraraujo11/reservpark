<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adicional_vr_tarifa extends Model
{
    protected $table = 'adicional_vr_tarifa';

    public function tarifas()
	{
		return $this->hasMany(Tarifa::class);
	}
}
