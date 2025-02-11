@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Nuevo usuario</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Llene los datos con cuidado</h3>
        </div>
        <div class="card-body">
            <form action="{{url('admin/usuarios')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre del usuario</label>
                            <input type="text" value="{{old('name')}}" name="name" class="form-control" required>
                            @error('name')
                            <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Correo del usuario</label>
                            <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
                            @error('email')
                            <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Contraseña del usuario</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        @error('password')
                            <small style="color: red">{{$message}}</small>
                            @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Repetir contraseña del usuario</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{url('admin/usuarios')}}" class="btn btn-default">Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Guardar registro</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>
</div>
@endsection
