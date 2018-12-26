@extends('layouts.master')
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

                    <blockquote class="blockquote text-center">
                    <h2 class="display-2"><strong> Proceso</strong> </h2>
                    </blockquote>
                    <p class="lead"> <strong> Radiccación </strong></p>
                    <p class="lead">{!! $proceso->radicacion !!}</p>
                    <p class="lead"> <strong> Demandante </strong></p>
                    <p class="lead">{!! $proceso->demandante !!}</p>
                    <p class="lead"> <strong> Demandado </strong></p>
                    <p class="lead">{!! $proceso->demandado !!}</p>
                    <p class="lead"> <strong> Fecha </strong></p>
                    <p class="lead">{!! $proceso->fecha !!}</p>
                    <p class="lead"> <strong> Descripción </strong></p>
                    <p class="lead">{!! $proceso->descripcion !!}</p>
                    <p class="lead"> <strong> Juzgado </strong></p>
                    <p class="lead">{!! $juzgado->nombre !!}</p>
                    <form class="form-horizontal" method="post">
                    
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                        <input type="hidden" id="idusuario" name="idusuario" value="{!!  Auth::user()->id; !!}">
                        <input type="hidden" id="idproceso" name="idproceso" value="{!!  $proceso->id; !!}">
                            <button type="submit" class="btn btn-primary">Añadir a mis Procesos</button>
                    </form>
                </div>     
            </div>    
    </div>

@endsection﻿
<!--  {!! action('ProcesosController@anadirproceso', $proceso->id,Auth->$id)}  <a href="{!! action('ProcesosController@anadirproceso', $proceso->id,Auth->$id)}" class="btn btn-primary"> Añadir a mis Procesos</a>--> 