@extends('layouts.master')

@section('content')
<div class="container col-md-8 col-md-offset-2">
<div class="panel panel-default">
        
            <div class="card">
                <div class="panel-heading"><h3 class="text-center">Actualizar Datos</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <form method="post">
            @foreach($errors->all() as $errors)
            <p class="alert alert-danger">{{$errors}}</p>
            @endforeach
                    
                    <div class="form-group ">
                        <label for="name" >Nombre</label>
                        <input type="text" maxlength="30" class="form-control" id="name" value="{!!  Auth::user()->name; !!}" name="name">
                    
                    <div class="form-group ">
                        <label for="apellidos">Apellidos</label>
                            <input type="text" maxlength="30" class="form-control" id="apellido"  name="apellido" >
                    </div>
                

                <div class="form-group">
                    <label for="email" >Correo</label>
                    <input type="email" class="form-control" id="email" value="{!!  Auth::user()->email; !!}" name="email" > 

                </div>

                
                    <div class="form-group">
                        <label for="cedula" > Numero de Cedula</label>        
                            <input type="number" maxlength="15" class="form-control" id="cedula"  name="cedula">                      
                    </div>
                    <div class="form-group">
                        <label for="celular" >Celular</label>
                            <input type="number" maxlength="10" class="form-control" id="celular"  name="celular">               
                    </div>
                

                    <div class="form-group">
                        <label for="direccion" >Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion">
                        <input type="hidden" id="idusuario" name="idusuario" value="{!!  Auth::user()->id; !!}">
                    </div>

                <div class="form-group">
                    <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                    <button type="submit" class="btn btn-raised btn-primary">Enviar</button>
            
                </div>

            </form>
                </div>
            </div>
        
    </div>
</div>
@endsection