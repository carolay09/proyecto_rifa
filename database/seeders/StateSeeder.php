<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state')->insert([
            'nombre' => 'activo'
        ]);

        DB::table('state')->insert([
            'nombre' => 'inactivo'
        ]);

        DB::table('state')->insert([
            'nombre' => 'pendiente'
        ]);

        DB::table('state')->insert([
            'nombre' => 'pagado'
        ]);
    }
}
