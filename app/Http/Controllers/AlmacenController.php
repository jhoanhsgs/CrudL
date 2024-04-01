<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacens = Almacen::all();
        $user = User::all();
        $user =array("personas"=>$user);

        $categoria = Categoria::all();
        $categoria =array("categoria"=>$categoria);

        return view('admin.almacen.index',['almacens'=>$almacens]);
    }


    function ceros($numero){
        $len=0;
        $cantidad_ceros = 5;
        $aux=$numero;
        $pos=strlen($numero);
        $len=$cantidad_ceros-$pos;
        for ($i=0;$i<$len;$i++){
            $aux="0".$aux;
        }
        return $aux;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $almacens = Almacen::all();

        $categorias = Categoria::all();

        $contador_de_id_productos = 1;
        foreach ($almacens as $almacen){
            $contador_de_id_productos++;
        }
        $resultado = $this->ceros($contador_de_id_productos);

        return view('admin.almacen.create',
            [
                'almacens'=>$almacens,
                'resultado'=>$resultado,
                'categorias'=>$categorias
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
        //$datos = request()->all();
        //return response()->json($datos);

        $file = $request->file('image');
        $fileName = time().'-'.$file->getClientOriginalName();
        $request->file('image')->storeAs('productos',$fileName,'public'); //cargar de forma publica
        //$request->file('file')->storeAs($id,$fileName); //cargar de forma privada

        $producto = new Almacen();
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->stock_maximo = $request->stock_minimo;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->fecha_ingreso = $request->fecha_ingreso;
        $producto->imagen = $fileName;
        $producto->user_id = $request->user_id;
        $producto->categoria_id = $request->id_categoria;

        $producto->save();
        return redirect()->back()
        ->with('mensaje','se registro el producto de la carpeta de la manera correcta')
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
        $producto = Almacen::find($id);
        return view('admin.almacen.show',['producto'=>$producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Almacen::find($id);
        $categorias = Categoria::all();
        return view('admin.almacen.edit',[
            'producto'=>$producto,
            'categorias'=>$categorias

        ]);
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

        //$datos = request()->all();
        //return response()->json($datos);

        //consulta verificadora
       if ($request->hasFile('image')) {
        //imagen vieja
        $old_imagen = $request->image_text;
        //nueva imagen
        $file = $request->file('image');
        $fileName = time().'-'.$file->getClientOriginalName();
        //echo $fileName." "."Vieja: ". $old_imagen;
        $request->file('image')->storeAs('productos',$fileName,'public'); //cargar de forma publica
        //$request->file('file')->storeAs($id,$fileNam e); //cargar de forma privada
        //borrando la imagen vieja
        //Storage::delete('public/productos/' . $old_imagen);
        //mover imagen vieja a papeleria
        $rutaProductos = 'public/productos/' . $old_imagen;
        $rutaPapelera = 'public/productos/papelera/' . $old_imagen;
        Storage::move($rutaProductos, $rutaPapelera);
       }else{
            //echo "no hay cambio de imagen";
       }




       /* $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);*/

        $producto = Almacen::find($id);

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->stock_maximo = $request->stock_maximo;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->categoria_id = $request->id_categoria;


        $producto->save();

        return redirect()->route('almacen.index')
            ->with('mensaje','se actualizo el producto de la manera correcta')
            ->with('icono','success');
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
