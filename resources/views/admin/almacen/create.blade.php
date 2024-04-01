@extends('layouts.admin')
@section('content')
<h1>Registro de un nuevo producto</h1>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos con cuidado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body" style="display: block;">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{url('admin/almacen')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- datos --}}
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Código:</label>
                                                <input type="text" class="form-control" value="P-{{$resultado}}" name="codigo" hidden>
                                                <input type="text" class="form-control" value="P-{{$resultado}}" name="" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Categoría:</label>
                                                            <div style="display: flex">
                                                                <select name="id_categoria" id="" class="form-control" required>
                                                                    <?php
                                                                    foreach ($categorias as $categoria){ ?>
                                                                        <option value="{{$categoria->id}}">
                                                                            {{$categoria->nombre}}
                                                                        </option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <a href="" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nombre del producto</label>
                                                <input id="" class="form-control" type="text" name="nombre_producto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Usuario:</label>
                                                <input type="text" value="{{Auth::user()->id}}" name="user_id" hidden>
                                            <input type="text" class="form-control" value="{{Auth::user()->email}}" name="user" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Descripción del producto:</label>
                                                <textarea name="descripcion" id="" cols="30" rows="2" class="form-control" type="text" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="">Stock:</label>
                                            <input type="number" class="form-control" value="" name="stock">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Stock mínimo:</label>
                                            <input type="number" class="form-control" value="" name="stock_minimo">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Stock_máximo:</label>
                                            <input type="number" class="form-control" value="" name="stock_maximo">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Precio compra:</label>
                                            <input type="number" class="form-control" value="" name="precio_compra">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Precio venta:</label>
                                            <input type="number" class="form-control" value="" name="precio_venta">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Fecha de ingreso:</label>
                                            <input type="date" class="form-control" value="" name="fecha_ingreso">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- imagen --}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Imagen del producto</label>
                                        <input type="file" name="image" class="form-control" id="file">
                                        <br>
                                        <output id="list" style=""></output>
                                        <script>
                                            function archivo(evt) {
                                                var files = evt.target.files; // FileList object
                                                // Obtenemos la imagen del campo "file".
                                                for (var i = 0, f; f = files[i]; i++) {
                                                    //Solo admitimos imágenes.
                                                    if (!f.type.match('image.*')) {
                                                        continue;
                                                    }
                                                    var reader = new FileReader();
                                                    reader.onload = (function (theFile) {
                                                        return function (e) {
                                                            // Insertamos la imagen
                                                            document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                        };
                                                    })(f);
                                                    reader.readAsDataURL(f);
                                                }
                                            }
                                            document.getElementById('file').addEventListener('change', archivo, false);
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <a href="{{ route('almacen.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar producto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
