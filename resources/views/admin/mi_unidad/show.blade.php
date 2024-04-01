@extends('layouts.admin')

@section('content')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">{{$carpeta->nombre}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <!-- Button trigger modal -->
            <a href="{{url('/admin/mi_unidad')}}" class="btn btn-default" ><i class="bi bi-arrow-bar-left"></i> Volver</a>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal_cargar_archivos">
                <i class="bi bi-cloud-upload-fill"></i> Subir archivo
            </button>
            <!-- Modal para cargar archivos-->
            <div class="modal fade" id="modal_cargar_archivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subir archivos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{url('/admin/mi_unidad/carpeta/upload')}}" method="POST" class="dropzone" id="myDropzone" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="text" value="{{$carpeta->id}}" name="id" hidden>
                            <div class="fallback">
                                <input type="file" name="file" multiple />

                            </div>
                        </div>
                        <!--<div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>-->
                    </form>
                <script>
                    Dropzone.options.myDropzone = {
                        paramName: "file",
                        dictDefaultMenssage:"Arrastra y suelta los archivos aquí o haz clic para seleccionar los archivos"

                    };
                </script>
                </div>
                </div>
            </div>








            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                <i class="bi bi-folder-fill"></i> Nueva carpeta
            </button>

            <!-- Modal para crear carpeta-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nombre de la carpeta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{url('/admin/mi_unidad/carpeta/creaar_subcarpeta')}}" method="post">
                        @csrf
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" value="{{$carpeta->id}}" name="carpeta_padre_id" hidden>
                                            <input type="text" value="{{Auth::user()->id}}" name="user_id" hidden>
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
<h5>Carpetas y archivos</h5>
<div class="row">
    @foreach ($subcarpetas as $subcarpeta)

    <div class="col-md-3" >
        <div class="divcontent">
            <div class="row" style="padding: 10px">

                <div class="col-2" style="text-align: center">
                    <i class="bi bi-folder-fill" style="font-size: 20pt;color: {{$subcarpeta->color}}"></i>
                </div>

                <div class="col-8" style="margin-top: 5px">
                    <a href="{{ url('/admin/mi_unidad/carpeta',$subcarpeta->id) }}" style="color: black">
                        {{$subcarpeta->nombre}}
                    </a>


                </div>

                <div class="col-2" style="margin-top: 5px; text-align: right">
                    <div class="btn-group" role="group">
                        <button  class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_cambiar_nombre{{$subcarpeta->id}}">
                                <i class="bi bi-pencil"></i>Cambiar Nombre
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear"></i>
                                Color de la carpeta <br>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="{{url('/admin/mi_unidad/carpeta')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="yellow" name="color" hidden>
                                        <input type="text" value="{{$subcarpeta->id}}" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: yellow"></i>
                                        </button>
                                    </form>
                                    <form action="{{url('/admin/mi_unidad/carpeta')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="blue" name="color" hidden>
                                        <input type="text" value="{{$subcarpeta->id}}" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: blue"></i>
                                        </button>
                                    </form>
                                    <form action="{{url('/admin/mi_unidad/carpeta')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="red" name="color" hidden>
                                        <input type="text" value="{{$subcarpeta->id}}" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: red"></i>
                                        </button>
                                    </form>
                                    <form action="{{url('/admin/mi_unidad/carpeta')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="" name="color" hidden>
                                        <input type="text" value="{{$subcarpeta->id}}" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: black"></i>
                                        </button>
                                    </form>
                                    <form action="{{url('/admin/mi_unidad/carpeta')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="green" name="color" hidden>
                                        <input type="text" value="{{$subcarpeta->id}}" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: green"></i>
                                        </button>
                                    </form>
                                  </div>

                            </a>
                            <a class="dropdown-item" href="#"><i class="bi bi-trash"></i>Eliminar</a>
                        </div>
                      </div>
                </div>

            </div>
        </div>
    </div>

     <!-- Modal para cambiar nombre de la subcarpeta-->
     <div class="modal fade" id="modal_cambiar_nombre{{$subcarpeta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar nombre</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin/mi_unidad/carpeta')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" value="{{$subcarpeta->id}}" name="id" hidden>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{$subcarpeta->nombre}}" name="nombre" required>
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
<hr>

<table class="table table-hover table-striped">
    <t  head>
        <tr>
            <th> Nro</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @php
            $contador = 1;
        @endphp
        @foreach ($archivos as $archivo)
        <tr>
            <td><center>{{$contador++;}}</center></td>
            <td>
                <?php
                    $nombre = $archivo->nombre;
                    $extension = pathinfo($nombre,PATHINFO_EXTENSION);
                    if ($extension == "jpg" or $extension == "png") {?><img src="{{asset('imagenes/iconos/jpg.png')}}" alt="" width="25px"> <?php }
                    if ($extension == "txt") {?><img src="{{asset('imagenes/iconos/txt.png')}}" alt="" width="25px"> <?php }
                    if ($extension == "docx") {?><img src="{{asset('imagenes/iconos/word.png')}}" alt="" width="25px"> <?php }
                    if ($extension == "pdf") {?><img src="{{asset('imagenes/iconos/pdf.png')}}" alt="" width="25px"> <?php }
                    if ($extension == "mp4") {?><img src="{{asset('imagenes/iconos/mp4.png')}}" alt="" width="25px"> <?php }
                    if ($extension == "mp3") {?><img src="{{asset('imagenes/iconos/mp3.png')}}" alt="" width="25px"> <?php }
                ?>

                <!-- Button trigger modal -->

                <a href="{{asset('storage/'.$carpeta->id.'/'.$archivo->nombre)}}" data-toggle="modal" data-target="#modal_visor{{$archivo->id}}" style="color: black">
                    {{$archivo->nombre}}
                </a>

                <?php
                if ($extension == "png" or $extension == "jpg") {?>
                        <!-- Modal -->
                    <div class="modal fade" id="modal_visor{{$archivo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$archivo->nombre}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body" style="text-align: center">
                                <img src="{{asset('storage/'.$carpeta->id.'/'.$archivo->nombre)}}" width="100%" alt="">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php }     ?>

                <?php
                if ($extension == "pdf") {?>
                        <!-- Modal -->
                    <div class="modal fade" id="modal_visor{{$archivo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$archivo->nombre}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body" style="text-align: center">
                                <iframe src="{{asset('storage/'.$carpeta->id.'/'.$archivo->nombre)}}" width="100%" height="500px" alt=""></iframe>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php }     ?>


                <?php
                if ($extension == "docx") {?>
                        <!-- Modal -->
                    <div class="modal fade" id="modal_visor{{$archivo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$archivo->nombre}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body" style="text-align: center">
                                <img src="{{url('/imagenes/iconos/word.png')}}" width="100%" alt=""><br>
                                <a href="{{asset('storage/'.$carpeta->id.'/'.$archivo->nombre)}}"  class="btn btn-success">
                                    descargar
                                </a>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php }     ?>


                <?php
                if ($extension == "mp4") {?>


                        <!-- Modal -->
                    <div class="modal fade" id="modal_visor{{$archivo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$archivo->nombre}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="text-align: center">


                                    <video id="my-video" style="width: 100%;" height="500px;" class="video-js" controls preload="auto" data-setup="{}">
                                        <source src="{{asset('storage/'.$carpeta->id.'/'.$archivo->nombre)}}" type="video/mp4">
                                    </video>

                                </div>

                            </div>
                        </div>
                    </div>
                <?php }     ?>

                <?php
                if ($extension == "mp3") {?>
                        <!-- Modal -->
                    <div class="modal fade" id="modal_visor{{$archivo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$archivo->nombre}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body" style="text-align: center">
                                <audio style="width: 100%;" height="500px" controls>
                                    <source src="{{asset('storage/'.$carpeta->id.'/'.$archivo->nombre)}}" type="audio/mp3">
                                </audio>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php }     ?>





            </td>
            <td><center>{{$archivo->created_at;}}</center></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    {{-- Boton de eliminar archivo --}}
                <form action="{{ url('/admin/mi_unidad/carpeta')}}" method="post" onclick="preguntar{{$archivo->id}}(event)" id="miFormulario{{$archivo->id}}">
                    @csrf
                    @method('DELETE')
                    <input type="text" value="{{$archivo->id}}" name="id" hidden>
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                </form>
                <script>
                    function preguntar{{$archivo->id}}(event) {
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
                                var form = $('#miFormulario{{$archivo->id}}');
                                form.submit();
                            }
                        });
                    }
                </script>

                {{-- Boton para compartir archivo --}}
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_compartir{{$archivo->id}}"><i class="bi bi-share-fill"></i></button>
                     <!-- Modal -->
                    <div class="modal fade" id="modal_compartir{{$archivo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Compartir archivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $archivo->nombre }}</p>
                                @php
                                    if( ($archivo->estado_archivo)== "PRIVADO" ){@endphp
                                        <b>Archivo privado</b><br>
                                       <form action="{{ route('mi_unidad.archivo.cambiar.privado.publico') }}" method="get">
                                        @csrf
                                            <input type="text" name="id" value="{{ $archivo->id }}" hidden>
                                            <button class="btn btn-success">Cambiar a público</button>
                                        </form>
                                    @php
                                    }else {@endphp
                                        <b>Archivo público</b><br>

                                        <hr>
                                        <form action="{{ route('mi_unidad.archivo.cambiar.publico.privado') }}" method="post">
                                        @csrf
                                            <input type="text" name="id" value="{{ $archivo->id }}" hidden>
                                            <button class="btn btn-primary">Cambiar a privado</button>

                                        </form>
                                        <hr>
                                        <button  data-clipboard-target="#foo{{$archivo->id}}" class="btn btn-outline-primary">Copiar enlace</button>
                                        <input type="text" id="foo{{$archivo->id}}" value="{{asset('storage/'.$carpeta->id.'/'.$archivo->nombre)}}" class="form-control">
                                        <script>var clipboard = new ClipboardJS('.btn');</script>
                                        <br>
                                        <center><div id="qrcode{{$archivo->id}}"></div></center>
                                        <script>
                                            var opciones = {
                                                width: 150,
                                                height: 150
                                            };
                                            var texto = "{{asset('storage/'.$carpeta->id.'/'.$archivo->nombre)}}";
                                            var qrcode = new QRCode("qrcode{{$archivo->id}}", opciones);
                                            qrcode.makeCode(texto);

                                        </script>
                                        @php
                                    }
                                @endphp
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>




{{--  <img src="{{ route('mostrar.archivos.privado',['carpeta'=>$archivo->carpeta_id, 'archivo'=>$archivo->nombre]) }}" alt="">
<a href="{{ route('mostrar.archivos.privado',['carpeta'=>$archivo->carpeta_id, 'archivo'=>$archivo->nombre]) }}">archivo</a>--}}

@endsection
