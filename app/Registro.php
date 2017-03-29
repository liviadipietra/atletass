<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    public function evento(){
        return $this->belongsTo('App\Evento');
    }

    public function atleta(){
        return $this->belongsTo('App\User');
    }
}
