@extends('layouts.app')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="well well bs-component">
                <div class="content">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="header"> {!!$proceso->radicacion !!} </h2>
                    <p>{!! $proceso->demandante !!}</p>
                    <p>{!! $proceso->demandado !!}</p>
                    <p>{!! $proceso->fecha !!}</p>
                    <p>{!! $proceso->descripcion !!}</p>
                    <p>{!! $juzgado->nombre !!}</p>
                    <form class="form-horizontal" method="post">
                    
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                        <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                        <input type="hidden" id="idusuario" name="idusuario" value="{!!  Auth::user()->id; !!}">
                        <input type="hidden" id="idproceso" name="idproceso" value="{!!  $proceso->id; !!}">
                            <button type="submit" class="btn btn-primary">Añadir a mis Procesos</button>
                        </div>
                    </form>
                </div>     
            </div>    
    </div>

@endsection﻿
<!--  {!! action('ProcesosController@anadirproceso', $proceso->id,Auth->$id)}  <a href="{!! action('ProcesosController@anadirproceso', $proceso->id,Auth->$id)}" class="btn btn-primary"> Añadir a mis Procesos</a>--> 