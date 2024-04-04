<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosSeeder extends Seeder
{

    public function run()
    {

      // elimina la cache de roles creados anteriormente
        app()['cache']->forget('spatie.permission.cache');

        // crear permisos de vista

// *************************************
// ADMINISTRADOR
// *************************************

       $permisos_admin = [

        'importar',

        // tabla roles
       'roles-ver',
       'roles-crear',
       'roles-editar',
       'roles-borrar',

        // tabla roles

       'obd2-ver',
       'obd2-crear',
       'obd2-editar',
       'obd2-borrar',
       'obd2-abrir',

       // tabla usuarios
       'usuarios-ver',
       'usuarios-crear',
       'usuarios-editar',
       'usuarios-borrar',
       'usuarios-reportes',

       // tabla Category
       'categorias-ver',
       'categorias-crear',
       'categorias-editar',
       'categorias-borrar',
       'categorias-reportes',

       // tabla proveedores
       'proveedores-ver',
       'proveedores-crear',
       'proveedores-editar',
       'proveedores-borrar',
       'proveedores-reportes',

       // tabla Clientes
       'clientes-ver',
       'clientes-crear',
       'clientes-editar',
       'clientes-borrar',
       'clientes-reportes',

       // tabla productos
       'productos-ver',
       'productos-crear',
       'productos-editar',
       'productos-borrar',
       'productos-reportes',

       // tabla Compras
       'compras-ver',
       'compras-crear',
       'compras-editar',
       'compras-borrar',
       'compras-reportes',

       // tabla ventas
       'ventas-ver',
       'ventas-crear',
       'ventas-editar',
       'ventas-borrar',
       'ventas-reportes',

       ]; 
       
// *************************************
// GERENTE
// *************************************
       $permisos_gerente = [
        // tabla roles
       'roles-ver',
       'roles-crear',
       'roles-editar',
       'roles-borrar',

       // tabla roles
       'obd2-ver',
       'obd2-crear',
       'obd2-editar',
       'obd2-borrar',
       'obd2-abrir',

       // tabla usuarios
       'usuarios-ver',
       'usuarios-crear',
       'usuarios-editar',
       'usuarios-borrar',
       'usuarios-reportes',

       // tabla Category
       'categorias-ver',
       'categorias-crear',
       'categorias-editar',
       'categorias-borrar',
       'categorias-reportes',

       // tabla proveedores
       'proveedores-ver',
       'proveedores-crear',
       'proveedores-editar',
       'proveedores-borrar',
       'proveedores-reportes',

       // tabla Clientes
       'clientes-ver',
       'clientes-crear',
       'clientes-editar',
       'clientes-borrar',
       'clientes-reportes',

       // tabla productos
       'productos-ver',
       'productos-crear',
       'productos-editar',
       'productos-borrar',
       'productos-reportes',

       // tabla Compras
       'compras-ver',
       'compras-crear',
       'compras-editar',
       'compras-borrar',
       'compras-reportes',

       // tabla ventas
       'ventas-ver',
       'ventas-crear',
       'ventas-editar',
       'ventas-borrar',
       'ventas-reportes',


       ];

// *************************************
// VENDEDOR
// *************************************
       $permisos_vendedor = [

        // tabla roles
       'obd2-ver',
       'obd2-crear',
       'obd2-editar',
       'obd2-abrir',

       // tabla Category
       'categorias-ver',

       // tabla Clientes
       'clientes-ver',
       'clientes-crear',
       'clientes-editar',

       // tabla productos
       'productos-ver',

       // tabla ventas
       'ventas-ver',
       'ventas-crear',

       ];

// *************************************
// CAJERO
// *************************************
       $permisos_cajero = [

        // tabla roles
       'obd2-ver',

       // tabla Category
       'categorias-ver',

       // tabla Clientes
       'clientes-ver',
       'clientes-crear',
       'clientes-editar',

       // tabla productos
       'productos-ver',

       // tabla ventas
       'ventas-ver',
       'ventas-crear',
       'ventas-editar',
       'ventas-borrar',
       'ventas-reportes',

       ]; 
// *************************************
// FIN VISTAS
// *************************************

       //########################################################################
       // Administrador
       //########################################################################

       // Crear roles y asignar permisos
       foreach($permisos_admin as $admin){
        Permission::create(['name'=>$admin]);

       }

        // Todos los permisos
        $roles = Role::create(['name' => 'Administrador']);

        // permisos de usuario

       foreach($permisos_admin as $admin){
        $roles->givePermissionTo($admin);

       }


       //########################################################################
       // Gerente
       //########################################################################

        $roles = Role::create(['name' => 'Gerente']);

        // permisos de usuario

       foreach($permisos_gerente as $gte){
        $roles->givePermissionTo($gte);

       }

       //########################################################################
       // Vendedor
       //########################################################################
        $roles = Role::create(['name' => 'Vendedor']);

        // permisos de usuario

       foreach($permisos_vendedor as $vend){
        $roles->givePermissionTo($vend);

       }

       //########################################################################
       // Cajero
       //########################################################################
        $roles = Role::create(['name' => 'Cajero']);

        // permisos de usuario

       foreach($permisos_cajero as $caja){
        $roles->givePermissionTo($caja);

       }


    }
}