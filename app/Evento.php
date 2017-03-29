<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public function registros(){
        return $this->hasMany('App\Registro');
    }
}
