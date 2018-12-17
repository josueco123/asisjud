@extends('layouts.app')
@section('content')

<div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Procesos Juzgados Primero Laborales </h2>
                </div> 

                <form class="form-horizontal" method="post">
                
                @foreach($errors->all() as $errors)
                <p class="alert alert-danger">{{$errors}}</p>
                 @endforeach

                 <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                 <fieldset>
                    <legend>Enviar un nuevo ticket</legend>
                    <div class="form-group">
                        <label for="fecha" class="col-lg-2 control-label">Fecha</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" id="fecha" placeholder="" name="fecha">
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="form-group">
                        <label for="id" class="col-lg-2 control-label">Id</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="id" placeholder="" name="id">
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </fieldset>
                 </form>

            </div>

</div>
@endsection﻿