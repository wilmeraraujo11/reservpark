<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parqueadero extends Model
{
    protected $table = 'parqueadero';

    public function ubicacion()
    {
    	return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }
    public function tipo_park()
    {
    	return $this->belongsTo(Tipo_park::class, 'id_tipo_park');
    }
    public function pisos()
    {
        return $this->hasMany(Piso::class);
    }
    public function tarifas()
    {
        return $this->hasMany(Tarifa::class);
    }
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
    public function ingresos_vehiculos()
    {
        return $this->hasMany(Ingreso_vehiculo::class, 'id_parqueadero');
    }
    public function usuario_parqueaderos()
    {
        return $this->hasMany(Parqueadero_usuario::class, 'id_usuario');
    }
    //muchos a muchos parqueadero - usuario
    /*
    public function users()
    {
        return $this->belongsToMany(User::class,'Parqueadero_usuario', 'id_parqueadero', 'id_usuario')->withTimestamps();
    }*/
    
}
