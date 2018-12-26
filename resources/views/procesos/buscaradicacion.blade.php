@extends('layouts.master')
@section('content')

<div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="card">
                <div class="panel-heading">
                    <h2 class="text-center"> Buscar Procesos </h2>
                </div> 

                <div class="card-body">
                <form  method="post">
                
                @foreach($errors->all() as $errors)
                <p class="alert alert-danger">{{$errors}}</p>
                 @endforeach

                 <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                 <fieldset>
                    
                    <div class="form-group">
                        <label for="radicacion" >Radicacion</label>
                            <input type="text" class="form-control" id="radicacion" placeholder="" name="radicacion">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                       
                    </div>
                </fieldset>
                 </form>
</div>
            </div>
</div>
</div>
@endsection