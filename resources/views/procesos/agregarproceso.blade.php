@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agregar Proceso</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <form class="form-horizontal" method="post">
            @foreach($errors->all() as $errors)
            <p class="alert alert-danger">{{$errors}}</p>
            @endforeach
                    
            <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                <fieldset>
                    <div class="form-group">
                        <label for="radicacion" class="col-lg-2 control-label">Radicacion</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="radicacion" placeholder="" name="radicacion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="demandante" class="col-lg-2 control-label">Demandante</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="demandante" name="demandante">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="demandado" class="col-lg-2 control-label">Demandado</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="demandado" placeholder="" name="demandado">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-lg-2 control-label">descripcion</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="descripcion" placeholder="" name="descripcion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-lg-2 control-label">Fecha</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" id="fecha" placeholder="" name="fecha">
                        </div>
                        </div>
                    <div class="form-group">
                        <label for="idjuzgado" class="col-lg-2 control-label">Juzgado</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="idjuzado" placeholder="" name="idjuzado">
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
        </div>
    </div>
</div>
@endsection