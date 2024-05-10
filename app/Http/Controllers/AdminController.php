<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Carpeta;
use App\Models\Compra;

class AdminController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $carpeta = Carpeta::all();
        $Comopras = Compra::all();
        $stock_productos = Almacen::sum('stock');
        return view('admin.index',compact(
            'usuarios',
            'carpeta',
            'Comopras',
            'stock_productos'
        ));
    }
}
