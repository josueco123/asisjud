<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Juzgado extends Model
{
    public function Procesos(){
        return $this->hasMany('App\Proceso');
    }
}
