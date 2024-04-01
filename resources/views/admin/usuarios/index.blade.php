@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de usuarios</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Datos registrados</h3>
            <div class="card-tools">
                <a href="{{url('/admin/usuarios/create')}}" class="btn btn-primary"><i class="bi bi-person-fill-add"></i> Nuevo usuario</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-sm table-striped table-hover">

                <thead>
                    <tr>
                        <th><center>Nro</center></th>
                        <th><center>Nombres</center></th>
                        <th><center>Email</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                </thead>
                <tbody>
                    @php $contador = 0; @endphp

                    @foreach($usuarios as $usuario)
                    @php
                        $contador ++;
                        $id = $usuario->id;
                    @endphp
                    <tr>
                        <td><center>{{$contador}}</center></td>
                        <td><center>{{$usuario->name}}</center></td>
                        <td><center>{{$usuario->email}}</center></td>
                        <td style="text-align: center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('usuarios.show',$usuario->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i> Mostrar</a>
                            <a href="{{route('usuarios.edit',$usuario->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i> Editar</a>
                            <form action="{{route('usuarios.destroy',$usuario->id)}}" onclick="preguntar<?=$id;?>(event)"
                                method="post" id="miFormulario<?=$id;?>">
                                @csrf
                                {{method_field('DELETE')}}
                                <!-- laravel 10 @method('PUT') -->
                                <button type="submit" class="btn btn-danger" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i> Borrar</button>
                            </form>

                            <script>
                                function preguntar<?=$id;?>(event) {
                                    event.preventDefault();
                                    swal.fire({
                                        title: 'Eleminar registro',
                                        text: '¿Desea eliminar este registro?',
                                        icon: 'question',
                                        showDenyButton: true,
                                        confirmButtonText: 'Eliminar',
                                        confirmButtonColor: '#a5161d',
                                        denyButtonColor: '#270a0a',
                                        denyButtonText: 'Cancelar',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            var form = $('#miFormulario<?=$id;?>');
                                            form.submit();
                                        }
                                    });
                                }
                            </script>


                        </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
        </div>

    </div>
    </div>
</div>
@endsection
