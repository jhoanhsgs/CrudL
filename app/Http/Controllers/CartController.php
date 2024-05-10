<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\detalle;
use App\Models\venta;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function add(Request $request)
    {
        $producto = Almacen::find($request->id);


        Cart::add([
            'id' => $producto->id,
            'name' => $producto->nombre,
            'price' => $producto->precio_venta,
            'qty' => 1,
            'weight' => 1,
            'options' => [
                'imagen' => $producto->imagen,
                'nombre' => null,
            ]
        ]);



        return redirect()->back()
            ->with('mensaje','Producto agregado ')
            ->with('icono','success');
    }

    public function vercarrito()
    {
        return view('shop.carrito');
    }

    public function incrementar(Request $request)
    {
        $item = Cart::content()->where("rowId", $request->id)->first();
        Cart::update($item->rowId, $item->qty + 1);
        return redirect()->back();
    }

    public function decrementar(Request $request)
    {
        $item = Cart::content()->where("rowId", $request->id)->first();
        Cart::update($item->rowId, $item->qty - 1);
        return redirect()->back();
    }

    public function eliminaritem(Request $request)
    {
        Cart::Remove($request->id);
        return back();
    }

    public function eliminacart()
    {
        Cart::destroy();
        return redirect()->route('index.shop')
            ->with('mensaje','se elimino el carrito de la manera correcta')
            ->with('icono','success');
    }

    public function confirmarCart(){

        $venta = new venta();
        $venta-> nro_venta    = 3;
        $venta-> id_cliente   =  auth()->user()->id;
        $venta-> total_pagado =  Cart::total();
        $venta->save();

        foreach (Cart::content() as $item) {
            $detalle = new detalle();
            $detalle->nro_venta = $venta->nro_venta;
            $detalle->id_producto = $item->id;
            $detalle->cantidad = $item->qty;
            $detalle->save();

        }


        Cart::destroy();
        return redirect()->back()
        ->with('mensaje','se registro la venta de la manera correcta')
            ->with('icono','success');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
