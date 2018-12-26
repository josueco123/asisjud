<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Proceso;
use App\Userdato;
use Auth;
use App\User;
use App\Juzgado;
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
        return view('procesos.agregarproceso');
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
        $proceso = new Proceso(array(
            'radicacion'=>$request->get('radicacion'),
            'demandante'=>$request->get('demandante'),
            'demandado'=>$request->get('demandado'),
            'descripcion'=>$request->get('descripcion'),
            'fecha'=>$request->get('fecha'),
            'idjuzgado'=>$request->get('idjuzado')

        ));

        $this->procesoexiste($request->get('radicacion'));

        //$radicacion = $request->get('radicacion');
        $proceso->save();
        
        return redirect('/agregarproceso')->with('status','proceso agragado');
       //$procesos2 = Proceso::where('procesos.radicacion','=',$radicacion)->get(); 
      
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

    public function buscarporjuzgado($id){

        $procesos = Proceso::where('procesos.idjuzgado','=',$id)->get();
        return view('procesos.buscarporjuzgado',compact('procesos')); 
    }

    public function juzgadofecha(){
        
        return view('procesos.juzgadofecha'); 
    }

    public function buscarjuzgadofecha(Request $request){

        $date = $request->get('fecha');
        $id = $request->get('juzgado');
        $procesos = Proceso::where('procesos.idjuzgado','=',$id)
        ->where('procesos.fecha','=',$date)
        ->get();
        $juzgado = Juzgado::find($id);
        return view('procesos.fechaprocesos',compact('procesos','juzgado')); 
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

    public function userprocesos(){

        $id = auth()->user()->id;
        $userdato = Userdato::where('userdatos.idusuario','=',$id)->firstOrFail();

        return view('procesos.misprocesos',compact('userdato'));
    }

    public function radicacionproceso(){
        return view('procesos.buscaradicacion');
    }

    public function buscarradicacion(Request $request){
        
        $rad = $request->get('radicacion');

        $procesos = Proceso::where('procesos.radicacion','=',$rad)->get();
        //$juzgado = $proceso->juzgado;
        return view('procesos.lista',compact('procesos'));  

    }

    public function procesoexiste($radicacion){
           
        $proceso = Proceso::where('procesos.radicacion','=',$radicacion)
        ->orderBy('created_at','desc')
        ->firstOrFail();

        $users = User::join('userdatos','users.id','=','userdatos.idusuario')
        ->join('userdato_procesos','userdatos.id', '=','userdato_procesos.userdato_id')
        ->join('procesos','procesos.id','=', 'userdato_procesos.proceso_id')
        ->where('procesos.radicacion','=',$radicacion)
        ->select('users.*')->get();
 
        foreach ($users as $user) {
            $user->notify(new NotifyUser($proceso));
        }


    }
}
