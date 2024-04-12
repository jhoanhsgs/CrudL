<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;


    public function perfil(){
        return $this->hasMany(perfil::class);
    }


    public function cuenta(){
        return $this->belongsTo(Compra::class,'id_compra');
    }

}
