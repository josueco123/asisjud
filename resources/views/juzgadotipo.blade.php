@extends('layouts.master')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="card">
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
                            @foreach($juzgados as $juzgado)
                                <tr>
                                <td> </td>
                                    <td>{!! $juzgado->nombre !!}  </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
        </div>    
    </div>
                @endsection