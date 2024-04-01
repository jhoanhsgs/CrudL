@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Datos del  suario</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Llene los datos con cuidado</h3>
        </div>
        <div class="card-body">
           
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre del usuario</label>
                            <p>{{$usuario->name}}</p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Correo del usuario</label>
                            <p>{{$usuario->email}}</p>
                        </div>
                    </div>
                </div>
                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{url('admin/usuarios')}}" class="btn btn-default">Volver</a>
                    </div>
                </div>
        </div>

    </div>    
    </div>
</div>
@endsection