@extends('layouts.app')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Procesos Juzgados Primero Laborales </h2>
                </div>     

                @if ($procesos->isEmpty())
                    <p> No hay Proceso.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Radicacion</th>
                                <th>Demandante</th>
                                <th>Demandado</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($procesos as $proceso)
                                <tr>
                                <td>{!! $proceso->id !!}</td>
                                    <td><a href="{!! action('ProcesosController@show',$proceso->id) !!}" >
                                    {!! $proceso->radicacion !!} </a> </td>
                                    <td>{!! $proceso->demandante !!}</td>
                                    <td>{!! $proceso->demandado  !!}</td>
                                    <td>{!! $proceso->descripcion  !!}</td>
                                    <td>{!! $proceso->fecha  !!}</td>
                        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection﻿