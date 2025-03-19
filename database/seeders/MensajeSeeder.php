<?php

namespace Database\Seeders;

use App\Models\Mensaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mensaje::factory()->count(50)->create();

        Mensaje::make([
            'nombre' => 'Juan',
            'correo' => 'algo',
            'mensaje' => 'Hola',
        ]);

        DB::table('mensajes')->insert([
            'nombre' => 'Juan',
            'correo' => 'algo@asdf.com',
            'mensaje' => 'Hola',
        ]);
    }
}
