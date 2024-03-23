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

       $permisos_admin = [

        'importar',

        // tabla roles
       'ver-rol',
       'crear-rol',
       'editar-rol',
       'borrar-rol',

       // tabla usuarios
       'ver-usuarios',
       'crear-usuarios',
       'editar-usuarios',
       'borrar-usuarios',
       'reportes-usuarios',

       // tabla Category
       'ver-categorias',
       'crear-categorias',
       'editar-categorias',
       'borrar-categorias',
       'reportes-categorias',

       // tabla proveedores
       'ver-proveedores',
       'crear-proveedores',
       'editar-proveedores',
       'borrar-proveedores',
       'reportes-proveedores',

       // tabla Clientes
       'ver-clientes',
       'crear-clientes',
       'editar-clientes',
       'borrar-clientes',
       'reportes-clientes',

       // tabla productos
       'ver-productos',
       'crear-productos',
       'editar-productos',
       'borrar-productos',
       'reportes-productos',

       // tabla Compras
       'ver-compras',
       'crear-compras',
       'editar-compras',
       'borrar-compras',
       'reportes-compras',

       // tabla ventas
       'ver-ventas',
       'crear-ventas',
       'editar-ventas',
       'borrar-ventas',
       'reportes-ventas',

       ]; 
       

       $permisos_gerente = [

        // tabla roles
       'ver-rol',
       'crear-rol',
       'editar-rol',
       

       // tabla usuarios
       'ver-usuarios',
       'crear-usuarios',
       'editar-usuarios',
       'borrar-usuarios',
       'reportes-usuarios',

       // tabla Category
       'ver-categorias',
       'crear-categorias',
       'editar-categorias',
       'reportes-categorias',

       // tabla Clientes
       'ver-clientes',
       'crear-clientes',
       'editar-clientes',
       'reportes-clientes',

       // tabla productos
       'ver-productos',
       'crear-productos',
       'editar-productos',
       'reportes-productos',

       // tabla Compras
       'ver-compras',
       'crear-compras',
       'editar-compras',
       'reportes-compras',

       // tabla ventas
       'ver-ventas',
       'crear-ventas',
       'editar-ventas',
       'reportes-ventas',

       ]; 


       $permisos_vendedor = [
       
       // tabla Clientes
       'ver-clientes',
       'crear-clientes',

       // tabla productos
       'ver-productos',

       // tabla ventas
       'ver-ventas',
       'crear-ventas',

       ]; 


       $permisos_cajero = [
       
       // tabla Clientes
       'ver-clientes',
       'crear-clientes',
       'editar-clientes',
       'borrar-clientes',

       // tabla productos
       'ver-productos',

       // tabla ventas
       'crear-ventas',

       ]; 


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
