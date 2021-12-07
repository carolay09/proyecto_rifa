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
        DB::table('states')->insert([
            'nombre' => 'activo'
        ]);

        DB::table('states')->insert([
            'nombre' => 'inactivo'
        ]);

        DB::table('states')->insert([
            'nombre' => 'pendiente'
        ]);

        DB::table('states')->insert([
            'nombre' => 'pagado'
        ]);
    }
}
