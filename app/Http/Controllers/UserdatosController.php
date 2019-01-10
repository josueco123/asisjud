<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserdatosFormRequest;
use App\Userdato;
use App\User;

class UserdatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserdatosFormRequest $request)
    {
        //
        $iduser = $request->get('idusuario');
        $userdato = new Userdato(array(
            'apellido'=> $request->get('apellido'),
            'cedula'=> $request->get('cedula'),
            'celular'=> $request->get('celular'),
            'direccion' => $request->get('direccion'),
            'idusuario' => $iduser
        ));

        $user = User::find($iduser);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $user->save();
        $userdato->save();
        /* notificaciones por email
        $data = array('userdar'=> )
        Mail::send('mail.welcome',$data, function($menssage){
            $menssage->from('servidordemail','asunto');
            $menssage->to('destinomail')->('mensaje');
        });
            */
        return redirect('/about')->with('status','datos actualizados');

        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
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
        $userdato = Userdato::where('userdatos.idusuario','=',$id)->firstOrFail();
        return view ('updateuser', compact('userdato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserdatosFormRequest $request)
    {
        //
        $iduser = $request->get('idusuario');

        $user = User::find($iduser);
        $userdato = Userdato::where('userdatos.idusuario','=',$iduser)->firstOrFail();
        $userdato->apellido = $request->get('apellido');
        $userdato->cedula = $request->get('cedula');
        $userdato->celular = $request->get('celular');
        $userdato->direccion = $request->get('direccion');

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $user->save();
        $userdato->save();

        return redirect("/updateuser/".$iduser)->with('status','Datos Actualizados');
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
}
