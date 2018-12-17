<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Userdato extends Model
{
    protected $fillable = ['apellido','cedula','celular','direccion','idusuario','estado'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function procesos(){
        return $this->belongsToMany('App\Proceso', 'userdato_procesos')
        ->withPivot('id', 'userdato_id','proceso_id');
    }
}
