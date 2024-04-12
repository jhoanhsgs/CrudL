<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perfil extends Model
{
    use HasFactory;


    public function cuenta(){
        return $this->belongsTo(perfil::class,'id_perfil');
    }


}
