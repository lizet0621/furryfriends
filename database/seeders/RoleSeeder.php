<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'nombre' => 'adoptante'],
            ['id' => 2, 'nombre' => 'refugionatural'],
            ['id' => 3, 'nombre' => 'refugiofisico'],
            ['id' => 4, 'nombre' => 'administrador'],
        ]);
        
    }
}
