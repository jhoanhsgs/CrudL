<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provedores = Proveedores::all();
        return view('admin.proveedores.index',['provedores'=>$provedores]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        /*$request->validate([
            'nombre' => 'required|max:100',
            'celular' => 'required|max:100',
            'email' => 'required|unique:users',
            'direccion' => 'required',

        ]);*/
        $proveedor = new Proveedores();

        $proveedor->nombre = $request->nombre;
        $proveedor->celular = $request->celular;
        $proveedor->telefono = $request->telefono;
        $proveedor->empresa = $request->empresa;
        $proveedor->email = $request->email;
        $proveedor->direccion = $request->direccion;




        $proveedor->save();
        return redirect()->back()
        ->with('mensaje','se registro el proveedor de la manera correcta')
        ->with('icono','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedores $proveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $id = $request->id;
        $proveedor = Proveedores::find($id);


        $proveedor->nombre = $request->nombre;
        $proveedor->celular = $request->celular;
        $proveedor->telefono = $request->telefono;
        $proveedor->empresa = $request->empresa;
        $proveedor->email = $request->email;
        $proveedor->direccion = $request->direccion;




        $proveedor->save();
        return redirect()->back()
        ->with('mensaje','se actualizo el proveedor de la manera correcta')
        ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedores $proveedores)
    {
        //
    }
}
