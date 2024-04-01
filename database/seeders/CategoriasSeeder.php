<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'name'=> "",
        ]);
        Categoria::create([
            'name'=> "Music",
        ]);
        Categoria::create([
            'name'=> "Job",
        ]);
    }
}
