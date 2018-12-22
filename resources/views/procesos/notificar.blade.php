@extends('layouts.app')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Procesos </h2>
                </div>     

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                @if ($users->isEmpty())
                    <p> No hay Procesos.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                            <th></th>
                                <th>id</th>
                                <th>name</th>
                                <th>id user</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                <td>  Ver </td>
                                    <td>{!! $user->id !!}  </td>
                                    <td>{!! $user->name !!}  </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>
@endsection