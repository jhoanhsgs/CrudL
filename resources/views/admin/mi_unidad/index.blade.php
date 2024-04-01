@extends('layouts.admin')

@section('content')


<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Mi unidad</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                <i class="bi bi-folder-fill"></i> Nueva carpeta
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nombre de la carpeta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/mi_unidad')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                        <input type="text" class="form-control" name="nombre" required>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </ol>

    </div>

</div>
<hr>
<h5>Carpetas</h5>
<div class="row">
    @foreach ($carpetas as $carpeta)

    <div class="col-md-3" >
        <div class="divcontent" data-toggle="tooltip" data-placement="bottom" title="{{$carpeta->nombre}}">
            <div class="row" style="padding: 10px">

                <div class="col-2" style="text-align: center">
                    <i class="bi bi-folder-fill" style="font-size: 20pt; color: {{$carpeta->color}}"></i>
                </div>

                <div class="col-8" style="margin-top: 5px">
                    <a href="{{ url('/admin/mi_unidad/carpeta',$carpeta->id) }}" style="color: black">
                        {{$carpeta->nombre}}
                    </a>


                </div>

                <div class="col-2" style="margin-top: 5px; text-align: right">
                    <div class="btn-group" role="group">
                        <button  class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_cambiar_nombre{{$carpeta->id}}">
                                <i class="bi bi-pencil"></i>Cambiar Nombre
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear"></i>
                                Color de la carpeta <br>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="{{url('/admin/mi_unidad')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="yellow" name="color" hidden>
                                        <input type="text" value="{{$carpeta->id}}" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: yellow"></i>
                                        </button>
                                    </form>
                                    <form action="{{url('/admin/mi_unidad')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="blue" name="color" hidden>
                                        <input type="text" value="{{$carpeta->id}}" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: blue"></i>
                                        </button>
                                    </form>
                                    <form action="{{url('/admin/mi_unidad')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="red" name="color" hidden>
                                        <input type="text" value="{{$carpeta->id}}" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: red"></i>
                                        </button>
                                    </form>
                                    <form action="{{url('/admin/mi_unidad')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="" name="color" hidden>
                                        <input type="text" value="{{$carpeta->id}}" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: black"></i>
                                        </button>
                                    </form>
                                    <form action="{{url('/admin/mi_unidad')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="green" name="color" hidden>
                                        <input type="text" value="{{$carpeta->id}}" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: green"></i>
                                        </button>
                                    </form>
                                  </div>

                            </a>
                            <form action="{{ url('/admin/mi_unidad/eliminar_carpeta',$carpeta->id) }}"
                                onclick="preguntar{{ $carpeta->id }}(event)" id="miFormularioB{{ $carpeta->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="text" value="{{ $carpeta->id }}" hidden>

                                <button type="submit" class="dropdown-item" href="#"><i class="bi bi-trash"></i>Eliminar</button>
                            </form>
                            <script>
                                function preguntar{{$carpeta->id}}(event) {
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
                                            var form = $('#miFormularioB{{$carpeta->id}}');
                                            form.submit();
                                        }
                                    });
                                }
                            </script>

                        </div>
                      </div>
                </div>

            </div>
        </div>
    </div>
     <!-- Modal para cambiar nombre de la carpeta-->
     <div class="modal fade" id="modal_cambiar_nombre{{$carpeta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar nombre</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin/mi_unidad')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" value="{{$carpeta->id}}" name="id" hidden>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{$carpeta->nombre}}" name="nombre" required>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </form>
        </div>
        </div>
    </div>


    @endforeach

</div>


@endsection
