@extends('layouts.app')
@section('content')

<div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Buscar por Radicacion </h2>
                </div> 

                <form class="form-horizontal" method="post">
                
                @foreach($errors->all() as $errors)
                <p class="alert alert-danger">{{$errors}}</p>
                 @endforeach

                 <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                 <fieldset>
                    <legend>Buscar</legend>
                    <div class="form-group">
                        <label for="radicacion" class="col-lg-2 control-label">Radicacion</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="radicacion" placeholder="" name="radicacion">
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
@endsection