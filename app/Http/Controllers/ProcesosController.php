<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proceso;
use App\Userdato;
use Auth;
use App\User;
use App\Notifications\NotifyUser;

class ProcesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $procesos = Proceso::all();
        return view('procesos.lista',compact('procesos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Para que nos devuelva una instancia de Illuminate\Pagination\LengthAwarePaginator 
        // y pagine cada 10 registros.  ->paginate(10)
        //$proceso = Proceso::whereId($id)->firstOrFail();
        //$juzgado = $proceso->juzgado->where("id","=",$proceso->idjuzgado);

        $proceso = Proceso::join("juzgados","procesos.idjuzgado","=","juzgados.id")
        ->find($id);
        $juzgado = $proceso->juzgado;
        return view('procesos.show',compact('proceso','juzgado'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function juzgadounolaboral($id){

        $procesos = Proceso::where('procesos.idjuzgado','=',$id)->get();
        return view('procesos.juzgadounolaboral',compact('procesos')); 
    }

    public function juzgadofecha(){
        return view('procesos.juzgadofecha'); 
    }

    public function buscarjuzgadofecha(Request $request){

        $date = $request->get('fecha');
        $id = $request->get('id');
        $procesos = Proceso::where('procesos.idjuzgado','=',$id)
        ->where('procesos.fecha','=',$date)
        ->get();
        return view('procesos.fechaprocesos',compact('procesos')); 
    }
    //{!! action('ProcesosController@buscarjuzgadofecha',)}

    public function anadirproceso(Request $request){

        $id = $request->get('idusuario');
        $idproceso = $request->get('idproceso');

        $proceso = Proceso::find($idproceso);
        $userdato = Userdato::where('userdatos.idusuario','=',$id)->firstOrFail();

        $proceso->userdatos()->save($userdato);

        User::find($userdato->idusuario)->notify(new NotifyUser($proceso));

        //return view('procesos.procesousuario');
        return redirect('/procesos')->with('status','Proceso añadido');
    }

    public function userprocesos($id){

        $userdato = Userdato::whereId($id)->firstOrFail();

        return view('procesos.misprocesos',compact('userdato'));
    }
}
