<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parqueadero_usuario extends Model
{
    protected $table = 'Parqueadero_usuario';

    public function parqueadero()
    {
        return $this->belongsTo(Parqueadero::class, 'id_parqueadero');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
