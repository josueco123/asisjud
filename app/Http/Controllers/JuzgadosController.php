<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juzgado;

class JuzgadosController extends Controller
{
    //
    public function index()
    {
        //
        $procesos = Juzgado::all();
        
    }

    public function juzgadotipo($tipo){
        
        return Juzgado::where('juzgados.tipo','=',$tipo)->get();
    }

}
