<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Carpeta;

class AdminController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $carpeta = Carpeta::all();
        return view('admin.index',compact('usuarios','carpeta'));
    }
}
