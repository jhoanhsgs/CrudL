<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
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
    public function upload(Request $request)
    {
        $id = $request->id;
        $file = $request->file('file');
        $fileName = time().'-'.$file->getClientOriginalName();
        //$request->file('file')->storeAs($id,$fileName,'public'); //cargar de forma publica
        $request->file('file')->storeAs($id,$fileName); //cargar de forma privada

        $archivo = new Archivo();

        $archivo->carpeta_id = $request->id;
        $archivo->nombre = $fileName;
        $archivo->estado_archivo = 'PRIVADO';
        $archivo->save();


        return redirect()->back()
            ->with('mensaje','se cargo el archivo de la manera correcta')
            ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar_archivo(Request $request)
    {
        $id = $request->id;
        $archivo = Archivo::find($id);
        $estado_archivo = $archivo->estado_archivo;

        if($estado_archivo=="PRIVADO"){
            Storage::delete([$archivo->carpeta_id.'/'.$archivo->nombre]);
        }else{
            Storage::delete(['publuc/'.$archivo->carpeta_id.'/'.$archivo->nombre]);
        }


        Archivo::destroy($id);
        return redirect()->back()
            ->with('mensaje','se elemino el archivo de la manera correcta')
            ->with('icono','success');

    }

    public function cambiar_de_privado_a_publico(Request $request){
        $id = $request->id;
        $estado_archivo = "PUBLICO";
        $archivo = Archivo::find($id);

        $carpeta_id = $archivo->carpeta_id;
        $nombre = $archivo->nombre;

        $archivo->estado_archivo = $estado_archivo;
        $archivo->save();

        $ruta_archivo_privado = $carpeta_id.'/'.$nombre;

        $ruta_archivo_publica = 'public/'.$carpeta_id.'/'.$nombre;

        Storage::move($ruta_archivo_privado,$ruta_archivo_publica);

        return redirect()->back()
        ->with('mensaje', 'se cambio el estado del archivo de la manera correcta')
        ->with('icono','success');
    }

    public function cambiar_de_publico_a_privado(Request $request){
        $id = $request->id;
        $estado_archivo = "PRIVADO";

        $archivo = Archivo::find($id);

        $carpeta_id = $archivo->carpeta_id;
        $nombre = $archivo->nombre;

        $archivo->estado_archivo = $estado_archivo;
        $archivo-> save();

        $ruta_archivo_privado = $carpeta_id.'/'.$nombre;

        $ruta_archivo_publica = 'public/'.$carpeta_id.'/'.$nombre;

        Storage::move($ruta_archivo_publica,$ruta_archivo_privado);

        return redirect()->back()
        ->with('mensaje', 'se cambio el estado del archivo de la manera correcta')
        ->with('icono','success');


    }
}
