@extends('layouts.master')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            @if ($procesos->isEmpty())
                    <p> No hay Procesos.</p>
                @else
                <div class="panel-heading">
                
                    <h2 class="text-center"> Procesos {!! $juzgado->nombre !!} </h2>
                </div>     

                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
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
                                    <td><a href="{!! action('ProcesosController@show',$proceso->id) !!}" >
                                    {!! $proceso->radicacion !!} </a> </td>
                                    <td>{!! $proceso->demandante !!}  </td>
                                    <td>{!! $proceso->demandado  !!}</td>
                                    <td>{!! $proceso->descripcion  !!}</td>
                                    <td>{!! $proceso->fecha  !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
    </div>

@endsection