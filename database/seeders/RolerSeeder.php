<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //el sistema tendra 2 tipos de usuarios
        //administrador
        //usuario

        $admin = Role::create(['name' => 'admin']);
        $usuario = Role::create(['name' => 'usuario']);

        Permission::create(['name' => 'admin.index'])->syncRoles([$admin,$usuario]);

        Permission::create(['name' => 'usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'suarios.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'mi_unidad.index'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'mi_unidad.store'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'mi_unidad.carpeta'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'mi_unidad.carpeta.update_subcarpeta'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'mi_unidad.carpeta.update_subcarpeta_color'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'mi_unidad.carpeta.crear_subcarpeta'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'mi_unidad.update'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'mi_unidad.update_color'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'carpeta.destroy'])->syncRoles([$admin,$usuario]);


        Permission::create(['name' => 'mi_unidad.archivo.upload'])->syncRoles([$admin]);
        Permission::create(['name' => 'mi_unidad.archivo.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'mi_unidad.archivo.cambiar.privado.publico'])->syncRoles([$admin]);
        Permission::create(['name' => 'mi_unidad.archivo.cambiar.publico.privado'])->syncRoles([$admin]);
        Permission::create(['name' => 'mostrar.archivos.privado'])->syncRoles([$admin]);


        Permission::create(['name' => 'almacen.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'almacen.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'almacen.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'almacen.show'])->syncRoles([$admin]);

    }
}
