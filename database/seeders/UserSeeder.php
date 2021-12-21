<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'dni' => '12345',
            'nombre' => 'administrador',
            'apellido' => 'administrador',
            'telefono' => 'administrador',
            'direccion' => 'lima',
            'email' => 'admi@rifa.com',
            'password' => bcrypt('Dieciocho(18).'),
            'idEstado' => '1',
            'idRol' => '2'
        ]);
    }
}
