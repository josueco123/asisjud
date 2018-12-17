@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actulizar Datos</div>

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

             @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
            <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                <fieldset>
                <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" value="{!!  Auth::user()->name; !!}" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="col-lg-2 control-label">Apellido</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="apellido" placeholder="" name="apellido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="email" value="{!!  Auth::user()->email; !!}" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cedula" class="col-lg-2 control-label">Cedula</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="cedula" placeholder="" name="cedula">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="celular" class="col-lg-2 control-label">Celular</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="celular" placeholder="" name="celular">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-lg-2 control-label">Direccion</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="direccion" placeholder="" name="direccion">
                        </div>
                        <input type="hidden" id="idusuario" name="idusuario" value="{!!  Auth::user()->id; !!}">
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