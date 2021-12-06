<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaffleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('raffles')->insert([
            'cantidadPart' => '10',
            'fechaSorteo' => '2021-12-25',
            'precioTicket' => '5',
            'idProducto' => '1'
        ]);

        DB::table('raffles')->insert([
            'cantidadPart' => '10',
            'fechaSorteo' => '2021-12-25',
            'precioTicket' => '5',
            'idProducto' => '2'
        ]);

        DB::table('raffles')->insert([
            'cantidadPart' => '10',
            'fechaSorteo' => '2021-12-25',
            'precioTicket' => '5',
            'idProducto' => '3'
        ]);
    }
}
