<?php

namespace App\Http\Controllers;

use App\Models\Carpeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarpetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $carpetas = Carpeta::whereNull('carpeta_padre_id')
                        ->where('user_id',$id_user)
                        ->get();
        return view('admin.mi_unidad.index',['carpetas'=>$carpetas]);
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
        $request->validate([
            'nombre' => 'required|max:191',
        ]);

        $carpeta = new Carpeta();
        $carpeta->nombre = $request->nombre;
        $carpeta->user_id = $request->user_id;

        $carpeta->save();
        return redirect()->route('mi_unidad.index')
            ->with('mensaje','se registro la carpeta de la manera correcta')
            ->with('icono','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carpeta = Carpeta::findOrFail($id);
        $subcarpetas = $carpeta->carpetasHijas;
        $archivos = $carpeta->archivos;
        return view('admin.mi_unidad.show',compact('carpeta','subcarpetas','archivos'));
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
    public function update(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombre' => 'required|max:191',
        ]);
        $id = $request->id;
        $carpeta = Carpeta::find($id);
        $carpeta->nombre = $request->nombre;

        $carpeta->save();
        return redirect()->route('mi_unidad.index')
            ->with('mensaje','se cambio el nombre de la carpeta de la manera correcta')
            ->with('icono','success');
    }

    public function update_color(Request $request){
        $id = $request->id;
        $carpeta = Carpeta::find($id);
        $carpeta->color = $request->color;

        $carpeta->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carpeta::destroy($id);

        Storage::deleteDirectory($id);
        Storage::deleteDirectory('public/'.$id);

        return redirect()->back()
            ->with('mensaje','se elemino la carpeta de la manera correcta')
            ->with('icono','success');

    }
    public function crear_subcarpeta(Request $request){
        $request->validate([
            'nombre' => 'required|max:191',
            'carpeta_padre_id' => 'required',
        ]);

        $carpeta = new Carpeta();
        $carpeta->nombre = $request->nombre;
        $carpeta->user_id = $request->user_id;
        $carpeta->carpeta_padre_id = $request->carpeta_padre_id;

        $carpeta->save();
        return redirect()->back()
            ->with('mensaje','se registro la carpeta de la manera correcta')
            ->with('icono','success');
    }
    public function update_subcarpeta(Request $request){
        $request->validate([
            'nombre' => 'required|max:191',
        ]);
        $id = $request->id;
        $carpeta = Carpeta::find($id);
        $carpeta->nombre = $request->nombre;

        $carpeta->save();
        return redirect()->back()
            ->with('mensaje','se actualizo la carpeta de la manera correcta')
            ->with('icono','success');
    }
    public function update_subcarpeta_color(Request $request){
        $id = $request->id;
        $carpeta = Carpeta::find($id);
        $carpeta->color = $request->color;

        $carpeta->save();
        return redirect()->back();
    }
}
