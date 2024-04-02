@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row mb-2">
        <div class="col-sm-8">
            <h1 class="m-0">Listado de proveedores
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    <i class="fa fa-plus"></i> Agregar Nuevo
                </button>
            </h1>
        </div>
        </div>



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Proveedores registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombre del proveedor</center></th>
                                    <th><center>Celular</center></th>
                                    <th><center>Teléfono</center></th>
                                    <th><center>Empresa</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Dirección</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $contador=1;?>
                                    @foreach ($provedores as $provedor)
                                    <tr>
                                            <td>{{ $contador++ }}</td>
                                            <td>{{ $provedor->nombre }}</td>
                                            <td>
                                                <a href="https://wa.me/57{{ $provedor->celular }}" target="_blank" class="btn btn-success">
                                                    <i class="fa fa-phone"></i>
                                                    {{ $provedor->celular }}
                                                </a>
                                            </td>
                                            <td>{{ $provedor->telefono }}</td>
                                            <td>{{ $provedor->empresa }}</td>
                                            <td>{{ $provedor->email }}</td>
                                            <td>{{ $provedor->direccion }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                            data-target="#modal-update{{ $provedor->id }}">
                                                        <i class="fa fa-pencil-alt"></i> Editar
                                                    </button>
                                                    <!-- modal para actualizar proveedor -->
                                                    <div class="modal fade" id="modal-update{{ $provedor->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #116f4a;color: white">
                                                                    <h4 class="modal-title">Actualización del proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{url('admin/proveedores/update')}}" method="post">
                                                                    @csrf
                                                                    {{method_field('PUT')}}
                                                                    <input type="text" name="id" value="{{ $provedor->id }}" hidden>
                                                                    <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Nombre del proveedor <b>*</b></label>
                                                                                    <input type="text" name="nombre" value="{{ $provedor->nombre }}" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Celular <b>*</b></label>
                                                                                    <input type="text" name="celular" value="{{ $provedor->celular }}" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Teléfono</label>
                                                                                    <input type="text" name="telefono" value="{{ $provedor->telefono }}" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Empresa <b>*</b></label>
                                                                                    <input type="text" name="empresa" value="{{ $provedor->empresa }}" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Email</label>
                                                                                    <input type="text" name="email" value="{{ $provedor->email }}" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Dirección <b>*</b></label>
                                                                                    <textarea name="direccion" cols="30" rows="3" class="form-control" required>{{ $provedor->direccion }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" class="btn btn-success" id="btn_update{{ $provedor->id }}">Actualizar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->

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

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>




<!-- modal para registrar proveedores -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1d36b6;color: white">
                <h4 class="modal-title">Creación de un nuevo proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/proveedores/create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre del proveedor <b>*</b></label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Celular <b>*</b></label>
                                <input type="number" name="celular" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="number" name="telefono" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Empresa <b>*</b></label>
                                <input type="text" name="empresa" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección <b>*</b></label>
                                <textarea name="direccion" cols="30" rows="3" class="form-control" ></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_create">Guardar proveedor</button>
                    </div>

                </form>
            </div>



        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
