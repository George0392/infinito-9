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
        'password' => bcrypt('18262688')
        ]);
        $root->assignRole('Administrador');

        // usuario con el rol admin
        $admin     =   User::create([
        'name'     => 'Admin',
        'email'    => 'admin@123.com',
        'password' => bcrypt('123456')
        ]);
        $admin->assignRole('Administrador');

        $gerente   = User::create([
        'name'     => 'Gerente',
        'email'    => 'gerente@123.com',
        'password' => bcrypt('123456')
        ]);
        $gerente->assignRole('Gerente');

        $vendedor= User::create([
        'name'     => 'vendedor',
        'email'    => 'vendedor@123.com',
        'password' => bcrypt('123456')
        ]);
        $vendedor->assignRole('Vendedor');

        $cajero= User::create([
        'name'     => 'cajero',
        'email'    => 'cajero@123.com',
        'password' => bcrypt('123456')
        ]);
        $cajero->assignRole('Cajero');
    }
}
