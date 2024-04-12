<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

//Route::get('/', function () { return view('admin'); });

Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios.index')->middleware('auth','can:usuarios.index');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('usuarios.create')->middleware('auth','can:usuarios.create');
Route::post('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'store'])->name('usuarios.store')->middleware('auth','can:usuarios.store');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('usuarios.show')->middleware('auth','can:usuarios.show');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('usuarios.edit')->middleware('auth','can:usuarios.edit');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('usuarios.update')->middleware('auth','can:usuarios.update');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('usuarios.destroy')->middleware('auth','can:usuarios.destroy');

//CARPETAS
Route::get('/admin/mi_unidad', [App\Http\Controllers\CarpetaController::class, 'index'])->name('mi_unidad.index')->middleware('auth');
Route::post('/admin/mi_unidad', [App\Http\Controllers\CarpetaController::class, 'store'])->name('mi_unidad.store')->middleware('auth');
Route::get('/admin/mi_unidad/carpeta/{id}', [App\Http\Controllers\CarpetaController::class, 'show'])->name('mi_unidad.carpeta')->middleware('auth');
Route::put('/admin/mi_unidad/carpeta', [App\Http\Controllers\CarpetaController::class, 'update_subcarpeta'])->name('mi_unidad.carpeta.update_subcarpeta')->middleware('auth');
Route::put('/admin/mi_unidad/carpeta', [App\Http\Controllers\CarpetaController::class, 'update_subcarpeta_color'])->name('mi_unidad.carpeta.update_subcarpeta_color')->middleware('auth');
Route::post('/admin/mi_unidad/carpeta/creaar_subcarpeta', [App\Http\Controllers\CarpetaController::class, 'crear_subcarpeta'])->name('mi_unidad.carpeta.crear_subcarpeta')->middleware('auth');
Route::put('/admin/mi_unidad', [App\Http\Controllers\CarpetaController::class, 'update'])->name('mi_unidad.update')->middleware('auth');
Route::put('/admin/mi_unidad', [App\Http\Controllers\CarpetaController::class, 'update_color'])->name('mi_unidad.update_color')->middleware('auth');

//ELIMINAR CARPETAS
Route::delete('/admin/mi_unidad/eliminar_carpeta/{id}', [App\Http\Controllers\CarpetaController::class, 'destroy'])->name('carpeta.destroy')->middleware('auth');


// Rutas par archivos
Route::post('/admin/mi_unidad/carpeta/upload', [App\Http\Controllers\ArchivoController::class, 'upload'])->name('mi_unidad.archivo.upload')->middleware('auth');
//rilinar archivo
Route::delete('/admin/mi_unidad/carpeta', [App\Http\Controllers\ArchivoController::class, 'eliminar_archivo'])->name('mi_unidad.archivo.destroy')->middleware('auth');

//cambiar estado de un archivo privado a publico
Route::get('/admin/mi_unidad/carpeta', [App\Http\Controllers\ArchivoController::class, 'cambiar_de_privado_a_publico'])->name('mi_unidad.archivo.cambiar.privado.publico')->middleware('auth');

//cambiar estado de un archivo publico a privada
Route::post('/admin/mi_unidad/carpeta', [App\Http\Controllers\ArchivoController::class, 'cambiar_de_publico_a_privado'])->name('mi_unidad.archivo.cambiar.publico.privado')->middleware('auth');


//Ruta para mostrar archivos privador
Route::get('storage/{carpeta}/{archivo}',function($carpeta,$archivo){
    if(Auth::check()){
        $path = storage_path('app'. DIRECTORY_SEPARATOR. $carpeta . DIRECTORY_SEPARATOR . $archivo);
        return response()->file($path);
    }else{
        abort(403,'no tiene permiso para acceder a este archivo');
    }

})->name('mostrar.archivos.privado');

//Rutas para almacen
//Mostrar index
Route::get('/admin/almacen', [App\Http\Controllers\AlmacenController::class, 'index'])->name('almacen.index')->middleware('auth');
//ruta crear
Route::get('/admin/almacen/create', [App\Http\Controllers\AlmacenController::class, 'create'])->name('almacen.create')->middleware('auth');
//Guardar producto
Route::post('/admin/almacen', [App\Http\Controllers\AlmacenController::class, 'store'])->name('almacen.store')->middleware('auth');

//mostrar productos detalles
Route::get('/admin/almacen/{id}', [App\Http\Controllers\AlmacenController::class, 'show'])->name('almacen.show')->middleware('auth');

//vista editar
Route::get('/admin/almacen/{id}/edit', [App\Http\Controllers\AlmacenController::class, 'edit'])->name('almacen.edit')->middleware('auth');
//update
Route::put('/admin/almacen/{id} ', [App\Http\Controllers\AlmacenController::class, 'update'])->name('almacen.update')->middleware('auth');



//proveedores

//index
Route::get('/admin/proveedores', [App\Http\Controllers\ProveedoresController::class, 'index'])->name('proveedores.index')->middleware('auth');
//crear
Route::post('/admin/proveedores/create', [App\Http\Controllers\ProveedoresController::class, 'store'])->name('proveedores.store')->middleware('auth');
//actualizar
Route::put('/admin/proveedores/update', [App\Http\Controllers\ProveedoresController::class, 'update'])->name('proveedores.update')->middleware('auth');


//Compras
//index
Route::get('/admin/compras', [App\Http\Controllers\CompraController::class, 'index'])->name('compras.index')->middleware('auth');
//mostrar compras detalles
Route::get('/admin/compras/{id}', [App\Http\Controllers\CompraController::class, 'show'])->name('compras.show')->middleware('auth');
//create
Route::get('/admin/create/compra', [App\Http\Controllers\CompraController::class, 'create'])->name('compras.create')->middleware('auth');


//vista editar
Route::get('/admin/compras/{id}/edit', [App\Http\Controllers\CompraController::class, 'edit'])->name('compras.edit')->middleware('auth');



//cuentas
//index
Route::get('/admin/cuentas', [App\Http\Controllers\CuentaController::class, 'index'])->name('cuentas.index')->middleware('auth');
//asignar_perfies
Route::post('/admin/cuentas/asignar', [App\Http\Controllers\CuentaController::class, 'asignar_perfil'])->name('asignar.perfil')->middleware('auth');

//publicas
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('index.shop');


