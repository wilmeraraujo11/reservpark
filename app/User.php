<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'usuario';
    protected $fillable = [
        'tdoc', 'desc_tipo', 'no_documento', 'name', 'ape', 'gen', 'dir', 'tel', 'email', 'password', 'id_rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeNo_documento($query, $no_documento)
    {
        //dd("scope: ". $no_documento);
        if($no_documento)
        return $query->where('no_documento', '$no_documento');

    }
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_gen');
    }
    public function tipo_documento()
    {
        return $this->belongsTo(Tipo_documento::class, 'id_tdoc');
    }
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
    //muchos a muchos parqueadero - usuario
    /*
    public function parqueaderos()
    {
        return $this->belongsToMany(Parqueadero::class,'Parqueadero_usuario', 'id_usuario', 'id_parqueadero')->withTimestamps();
    }
    */
    public function parqueadero_usuarios()
    {
        return $this->hasMany(Parqueadero_usuario::class, 'id_parqueadero');
    }
}
