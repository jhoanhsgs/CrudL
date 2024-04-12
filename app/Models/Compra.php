<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    public function producto(){
        return $this->belongsTo(Almacen::class,'id_producto');
    }
    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedor'); // Corregir la relación
    }
    public function user(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function cuenta(){
        return $this->hasMany(cuenta::class);
    }
}
