@extends('layouts.master')
@section('content')

<div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="card">
                <div class="panel-heading">
                    <h2 class="text-center">  Buscar Procesos </h2>
                </div> 
                <div class="card-body">
               
                <form method="post">
                
                @foreach($errors->all() as $errors)
                <p class="alert alert-danger">{{$errors}}</p>
                 @endforeach

                 <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                 <fieldset>

                    <div class="form-group">
                        <label for="fecha" >Fecha</label>
                        
                            <input type="date" class="form-control" id="fecha" placeholder="" name="fecha">
                        
                        </div>
                        
                        <div class="form-group">
                        <label for="tipojuzgado" >Tipo de Juzgado</label>
                            <select class="form-control" id="tipojuzgado" name="tipojuzgado" >
                            <option value="">Seleciona</option>
                                <option value="1">Civiles Municipales</option>
                                <option value="2">Laborales</option>
                                <option value="3">Famila</option>
                                <option value="4">Ejecucion</option>
                            </select>
    
                        </div>
                      

                        <div class="form-group">
                        <label for="juzgado" >Selecione el Juzgado</label>
                            <select class="form-control" id="juzgado" name="juzgado">
                            </select>
    
                        </div>

                        <div class="form-group">
                        
                            <button class="btn btn-default">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>

                        
                    
                </fieldset>
                 </form>
</div>
            </div>
</div>
</div>
@endsection﻿