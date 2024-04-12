@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row mb-2">
        <div class="col-sm-8">
            <h1 class="m-0">Listado de cuentas</h1>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listado de cuentas</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Perfiles</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                    @foreach ($cuentas as $cuenta)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cuenta->correo }}</td>
                                        <td>{{ $cuenta->contraseña }}</td>
                                        <td>

                                            <div class="d-flex justify-content-between">
                                                @for ($i = 1; $i <= 4; $i++)
                                                <i class="bi bi-person text-secondary" data-toggle="modal" data-target="#modalPerfil{{ $cuenta->id }}_{{ $i }}"></i>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalPerfil{{ $cuenta->id }}_{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="modalPerfilLabel{{ $cuenta->id }}_{{ $i }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalPerfilLabel{{ $cuenta->id }}_{{ $i }}">Asignar Perfil a {{ $cuenta->correo }}_{{ $i }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('admin/cuentas/asignar') }}" method="POST">
                                                                    @csrf
                                                                    <input type="text" value="{{ $cuenta->id }}" name="id_cuenta" hidden>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Perfil</label>
                                                                                <input type="text" class="form-control" name="perfil" value="Perfil {{ $i }}" hidden>
                                                                                <input type="text" class="form-control" name="perfil" value="Perfil {{ $i }}" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Codigo</label>
                                                                                <input type="text" class="form-control" name="codigo" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12"></div>
                                                                    </div>



                                                                    <button type="submit" class="btn btn-primary">Asignar Perfil</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endfor
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
