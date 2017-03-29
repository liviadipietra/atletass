<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'login', 'senha'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha',
    ];

    public function getAuthPassword()
    {
        return bcrypt($this->senha);
    }

    protected $table = 'atletas';

    public function registros(){
        return $this->hasMany('App\Registro', 'atleta_id');
    }
}
