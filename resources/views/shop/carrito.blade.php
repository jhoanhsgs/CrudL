@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">

      <div class="col-sm-7 btn-danger">
        <p class="text-center">Carrito</p>
        <div class="col-sm-12 btn-info">

            @if (Cart::content()->count())



            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Canditad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>

                            <div class="row">
                                <div class="col-md-12">
                                    <td class="m-0">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{asset('storage/productos/'.$item->options->imagen)}}" width="100%" >
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>{{ $item->name }}</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>Precio: {{number_format($item->price )}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/decrementarCart/{{ $item->rowId }}" class="btn btn-success">-</a>
                                            <button type="button" class="btn">{{ $item->qty }}</button>
                                            <a href="/incrementarCart/{{ $item->rowId }}" class="btn btn-success">+</a>
                                        </div>
                                    </td>
                                    <td>{{ number_format($item->qty * $item->price) }}</td>
                                    <td><a href="/eliminaritemCart/{{ $item->rowId }}" class="btn btn-sm text-danger">x</a></td>
                                </div>
                            </div>


                        </tr>
                    @endforeach



                </tbody>
            </table>

            @else
                <p class="text-center">Carrito vacio</p>
            @endif

        </div>
      </div>
      <div class="col-sm-5 btn-info">
        <p class="text-center">Detalles</p>
        <div class="col-sm-12 btn-danger">

            @if (Cart::content()->count())



            <div class="float-right">Total del carrito</div>

            @else
            <p class="text-center">Carrito vacio</p>
        @endif

      </div>
      </div>

    </div>
</div>

<div class="row">
  <div class="col-md-12">
    <p class="text-center">Carrito</p>

    <div class="col-md-7">

    </div>

    <div class="col-md-5">
        <p>Detalles </p>
        <div class="col-sm-4">
            <a href="{{ route('cart.eliminar') }}" class="btn btn-outline-danger">Eliminar carrito</a>
        </div>
        <div class="col-sm-4">
            @auth
                <a href="{{ route('cart.confirmar') }}" class="btn btn-danger">Procesar pedido</a>
            @else
                <a href="/login">ingresar para ordenar</a>
            @endauth
        </div>
    </div>
  </div>
</div>

@if (Cart::content()->count())

@else
    <p class="text-center">Carrito vacio</p>
@endif


@endsection
