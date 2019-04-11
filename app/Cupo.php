<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupo extends Model
{
    protected $table = 'cupo';
	
	public function piso()
    {
    	return $this->belongsTo(Piso::class, 'piso_id');
    }
}
