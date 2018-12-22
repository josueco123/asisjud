<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Proceso extends Model
{
    protected $guarded = ['id'];

    public function juzgado(){
        return $this->belongsTo('App\Juzgado','id');
    }

    public function userdatos()
    {
        return $this->belongsToMany('App\Userdato', 'userdato_procesos')
        ->withPivot('id', 'userdato_id','proceso_id');
        // Si el nombre de la tabla es diferente a lo predeterminado o el ID de la tabla tiene otro nombre.
        //return $this->belongsToMany('App\User', 'user_roles', 'role_id', 'user_id');
    }
}
