<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_documento extends Model
{
    protected $table = 'tipo_documento';

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
