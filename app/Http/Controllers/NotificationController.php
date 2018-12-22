<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Proceso;
use App\User;

class NotificationController extends Controller
{
    //
    public function get(){
        return  auth()->user()->unreadNotifications;
    }

    public function markAsRead(Request $r){
        auth()->user()->unreadNotifications->find($r->get('not_id'))->markAsRead();
        
    }

    public function readProceso($proceso_id,$not_id){
        
        auth()->user()->unreadNotifications->find($not_id)->markAsRead();
        
        $proceso = Proceso::find($proceso_id);
        $juzgado = $proceso->juzgado;
        return view('procesos.show',compact('proceso','juzgado'));  
    }
}
