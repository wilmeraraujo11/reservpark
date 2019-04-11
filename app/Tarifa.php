<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $table = 'tarifa';

    public function parqueadero()
    {
    	return $this->belongsTo(Parqueadero::class);
    }
    public function valor_tarifa()
    {
    	return $this->belongsTo(Valor_tarifa::class);
    }
    public function adicional_vr_tarifa()
    {
    	return $this->belongsTo(Adicional_vr_tarifa::class);
    }

}
