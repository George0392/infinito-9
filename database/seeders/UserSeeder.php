<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
         // usuario con el rol super-admin
        $root      = User::create([
        'name'     => 'George Galindez',
        'email'    => 'root@123.com',
        'phone'    => '04125167087',
        'status'   => 'Activo',
        'password' => bcrypt('18262688'),
        'image'    => 'root.jpg',
        ]);
        $root->assignRole('Administrador');

        // usuario con el rol admin
        $admin     =   User::create([
        'phone'    => '04125167087',
        'status'   => 'Activo',
        'image'    => 'admin.jpg',
        'name'     => 'Admin',
        'email'    => 'admin@123.com',
        'password' => bcrypt('123456')
        ]);
        $admin->assignRole('Administrador');

        $gerente   = User::create([
        'phone'    => '04125167087',
        'status'   => 'Activo',
        'image'    => 'gte.jpg',
        'name'     => 'Gerente',
        'email'    => 'gerente@123.com',
        'password' => bcrypt('123456')
        ]);
        $gerente->assignRole('Gerente');

        $vendedor= User::create([
        'phone'    => '04125167087',
        'status'   => 'Bloqueado',
        'image'    => 'vende.jpg',
        'name'     => 'vendedor',
        'email'    => 'vendedor@123.com',
        'password' => bcrypt('123456')
        ]);
        $vendedor->assignRole('Vendedor');

        $cajero= User::create([
        'phone'    => '04125167087',
        'status'   => 'Bloqueado',
        'image'    => 'caja.jpg',
        'name'     => 'cajero',
        'email'    => 'cajero@123.com',
        'password' => bcrypt('123456')
        ]);
        $cajero->assignRole('Cajero');
    }
}
