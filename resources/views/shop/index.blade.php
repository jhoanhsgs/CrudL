@extends('layouts.public')

@section('badges')
    <a href="{{ route('cart.ver') }}" type="button" class="nav-link position-relative">
        <i class="bi bi-cart-fill"></i>
        @if (Cart::content()->count())


            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ Cart::content()->count() }}
            </span>

        @endif
    </a>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-3">
                    <div class="card text-center">
                        <img src="{{asset('storage/productos/'.$producto->imagen)}}" class="card-img-top">
                        <div class="card-body">
                            <h2>{{ $producto->nombre }}</h2>
                            <p>$COP {{ $producto->precio_venta }}</p>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <input type="text" name="id" value="{{$producto->id}}" hidden>
                                <input type="submit" name="btn" class="btn btn-success w-100" value="addToCart">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            @if (Count(Cart::content()))
                <div class="col-sm-5">
                    <p class="text-center">resumen carrito</p>
                    <table class="table">
                        <tbody>
                            @foreach (Cart::content() as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }} x {{ $item->price }}</td>
                                    <td>{{ number_format($item->qty * $item->price,2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Subtotal COP${{ Cart::subtotal() }}</td>
                            </tr>
                            <tr>
                                <td>Total COP${{ Cart::total() }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('cart.ver') }}">Ver carrito</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>


@endsection
