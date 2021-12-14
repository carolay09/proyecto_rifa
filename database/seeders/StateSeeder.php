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
            'nombre' => 'publicado',
            'descripcion' => 'rifa publicada para que los usuarios puedan comprar tickets'
        ]);

        DB::table('states')->insert([
            'nombre' => 'sin publicar',
            'descripcion' => 'rifa aun no publicada, usuarios no pueden comprar tickets'
        ]);

        DB::table('states')->insert([
            'nombre' => 'pendiente',
            'descripcion' => 'tickets en el carrito a espera de comfirmar una compra'
        ]);

        DB::table('states')->insert([
            'nombre' => 'en espera',
            'descripcion' => 'tickets en espera de confirmacion de numero de operacion'
        ]);

        DB::table('states')->insert([
            'nombre' => 'revision',
            'descripcion' => 'numero de operacion en espera de ser revisados'
        ]);

        DB::table('states')->insert([
            'nombre' => 'observado',
            'descripcion' => 'ticket con numero de operacion observados'
        ]);

        DB::table('states')->insert([
            'nombre' => 'pagado',
            'descripcion' => 'tickets con numero de operacion confirmados'
        ]);

        Db::table('states')->insert([
            'nombre' => 'disponible',
            'descripcion' => 'producto que aun no es usado en una rifa'
        ]);

        DB::table('states')->insert([
            'nombre' => 'en uso',
            'descripcion' => 'producto usado en una rifa'
        ]);

        DB::table('states')->insert([
            'nombre' => 'activo',
            'descripcion' => 'usuario activa para que los usuarios puedan comprar tickets'
        ]);

        DB::table('states')->insert([
            'nombre' => 'inactivo',
            'descripcion' => 'usuario aun no activada, usuarios no pueden comprar tickets'
        ]);

        DB::table('states')->insert([
            'nombre' => 'bloqueado',
            'descripcion' => 'usuarios no pueden ver categorias'
        ]);

        DB::table('states')->insert([
            'nombre' => 'desbloqueado',
            'descripcion' => 'usuarios pueden ver categorias'
        ]);
    }
}
