@extends('layouts.admin')

@section('content')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Listado de productos</h1>
    </div>


</div>
    <hr>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Productos registrados</h3>
                        <div class="card-tools">
                            <a href="{{url('/admin/almacen/create')}}" class="btn btn-primary"><i class="bi bi-person-fill-add"></i> Nuevo producto</a>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th><center>Nro</center></th>
                                            <th><center>Codigo</center></th>
                                            <th><center>Imagen</center></th>
                                            <th><center>Nombre</center></th>
                                            <th><center>Stock</center></th>
                                            <th><center>P-Compra</center></th>
                                            <th><center>P-Venta</center></th>
                                            <th><center>Fecha compra</center></th>
                                            <th><center>Usuario</center></th>
                                            <th><center>Acciones</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                                $contador_producto=1;
                                            @endphp
                                        @foreach ($almacens as $almacen)
                                        <tr>
                                            <td><center>{{$contador_producto++;}}</center></td>
                                            <td>{{$almacen->codigo}}</td>
                                            <td>
                                                <img src="{{asset('storage/productos/'.$almacen->imagen)}}" width="50px" alt="">
                                            </td>
                                            <td>{{$almacen->nombre}}</td>
                                            <td>{{$almacen->stock}}</td>
                                            <td>{{$almacen->precio_compra}}</td>
                                            <td>{{$almacen->precio_venta}}</td>
                                            <td>{{$almacen->fecha_ingreso}}</td>
                                            <td>{{$almacen->user->email}}</td>
                                            <td>
                                                <center>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('almacen.show',$almacen->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                        <a href="{{route('almacen.edit',$almacen->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                                      </div>
                                                </center>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
