@extends('layouts.master')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="card">
                <div class="panel-heading">
                    <h2 class="text-center"> Procesos </h2>
                </div>  
                <script>
                    Push.create('Hello World!')
                </script>   
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                @if ($procesos->isEmpty())
                    <p> No hay Proceso.</p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th></th>
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
                                <td> <a href="{!! action('ProcesosController@show',$proceso->id) !!}" > Ver </a></td>
                                    <td>{!! $proceso->radicacion !!}  </td>
                                    <td>{!! $proceso->demandante !!}</td>
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
    </div>
@endsection