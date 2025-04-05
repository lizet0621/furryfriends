<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
           
             // Enviar un admin:   php artisan db:seed --class=AdminUserSeeder

            [
                'name' => 'Admin Mariana',
                'email' => 'mariana@gmail.com',
                'password' => Hash::make('admin123'),
                'telefono' => '1234567890',
                'direccion' => 'Calle 21',
                'ciudad' => 'Ciudad Ejemplo',
                'capacidad' => 50,
                'horarios' => '9am - 5pm',
                'responsable' => 'Mariana Leal',
                'servicios' => 'Consultoría',
                'id_rol' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin Emilly',
                'email' => 'emilly@gmail.com',
                'password' => Hash::make('admin1234'),
                'telefono' => '1234567890',
                'direccion' => 'Calle Falsa 31',
                'ciudad' => 'Ciudad Ejemplo',
                'capacidad' => 50,
                'horarios' => '9am - 5pm',
                'responsable' => 'Emilly Cinaricicua',
                'servicios' => 'Consultoría',
                'id_rol' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin Juan',
                'email' => 'juan@gmail.com',
                'password' => Hash::make('admin12345'),
                'telefono' => '1234567890',
                'direccion' => 'Calle 41',
                'ciudad' => 'Ciudad Ejemplo',
                'capacidad' => 50,
                'horarios' => '9am - 5pm',
                'responsable' => 'Juan Valencia',
                'servicios' => 'Consultoría',
                'id_rol' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}