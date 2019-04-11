<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'genero';

    public function users()
    {
    	return $this->hasMany(Genero::class);
    }
}
