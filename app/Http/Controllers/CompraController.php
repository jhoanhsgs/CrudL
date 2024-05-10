<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Compra;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::all();
        return view('admin.compras.index',['compras'=>$compras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Almacen::all();
        $compras = Compra::all();
        $proveedores = Proveedores::all();

        return view('admin.compras.create',
            [
                'productos'=>$productos,
                'compras'=>$compras,
                'proveedores'=>$proveedores
            ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id_producto = $request->id_producto;
        $nro_compra = $request->nro_compra;
        $fecha_compra = $request->fecha_compra;
        $id_proveedor  = $request->id_proveedor;
        $comprobante = $request->comprobante;
        $id_usuario  = $request->id_user;
        $precio_compra = $request->precio_compra;
        $cantidad = $request->cantidad;
        $stock_total = $request->stock_total;

        DB::beginTransaction();

        try{
            $compra = new Compra();
            $compra->id_producto = $id_producto;
            $compra->nro_compra = $nro_compra;
            $compra->fecha_compra = $fecha_compra;
            $compra->id_proveedor  = $id_proveedor;
            $compra->comprobante = $comprobante;
            $compra->id_usuario  = $id_usuario;
            $compra->precio_compra = $precio_compra;
            $compra->cantidad = $cantidad;
            $compra->save();

            //actualizar el stock
            //$almacen = Almacen::find($stock_total);
            Almacen::where('id', $id_producto)->update(['stock' => $stock_total]);
           //$producto->stock

           DB::commit();

           // Crear un array para los mensajes
        $mensaje = 'Se registró la compra de manera correcta';
        $icono = 'success';
        // Devolver los mensajes en formato JSON
        return response()->json(['mensaje' => $mensaje, 'icono' => $icono]);
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
        DB::rollback();

        // Redireccionar con mensaje de error
        $mensaje = 'error al enviar los datos';
        $icono = 'error';
        }








    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = Compra::find($id);
        return view('admin.compras.show',['compra'=>$compra]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
