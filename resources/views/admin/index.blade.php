@extends('layouts.admin')

@section('content')
<div class="row">
    <h1>Principal</h1>
</div>
<hr>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
        <div class="inner">
            @php $contador_usuarios =0; @endphp
            @foreach ($usuarios as $usuario)
                @php $contador_usuarios++; @endphp
            @endforeach
        <h3>{{$contador_usuarios}}</h3>
        <p>Usuarios registrados</p>
        </div>
        <div class="icon">
        <i class="fas fa-user-plus"></i>
        </div>
        <a href="{{url('/admin/usuarios')}}" class="small-box-footer">
        Más información <i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                @php $contador_carpetas =0; @endphp
                @foreach ($carpeta as $carpeta)
                    @php $contador_carpetas++; @endphp
                @endforeach
                <h3>{{$contador_carpetas}}</h3>
                <p>Carpetas registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a   class="small-box-footer">
                ,
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                @php $contador_Comopras =0; @endphp
                @foreach ($Comopras as $carpeta)
                    @php $contador_Comopras++; @endphp
                @endforeach
                <h3>{{$contador_Comopras}}</h3>
                <p>Compras registradas</p>
            </div>
            <div class="icon">
                <i class="fas fa-tags"></i>
            </div>
            <a   class="small-box-footer">
                ,
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$stock_productos}}</h3>
                <p>Cuentas compradas</p>
            </div>
            <div class="icon">
                <i class="fas fa-tags"></i>
            </div>
            <a   class="small-box-footer">
                ,
            </a>
        </div>
    </div>
</div>
@endsection
