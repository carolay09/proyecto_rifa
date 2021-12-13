<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nombre' => 'Telefonía',
            'imagen' => 'Telefonía',
            'idEstado' => '1'
        ]);

        DB::table('categories')->insert([
            'nombre' => 'ropa',
            'imagen' => 'ropa',
            'idEstado' => '1'
        ]);
    }
}
