<?php

namespace Database\Seeders;

use App\Models\Asistente;
use App\Models\Evento;
use Illuminate\Database\Seeder;

class AsistenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventoIds = Evento::query()->pluck('id')->all();

        if (empty($eventoIds)) {
            return;
        }

        $asistentes = [
            ['nombre' => 'Daniel', 'apellido' => 'Garcia', 'email' => 'daniel.garcia@demo.com', 'telefono' => '5510010001'],
            ['nombre' => 'Mariana', 'apellido' => 'Flores', 'email' => 'mariana.flores@demo.com', 'telefono' => '5510010002'],
            ['nombre' => 'Andres', 'apellido' => 'Ruiz', 'email' => 'andres.ruiz@demo.com', 'telefono' => '5510010003'],
            ['nombre' => 'Valeria', 'apellido' => 'Campos', 'email' => 'valeria.campos@demo.com', 'telefono' => '5510010004'],
            ['nombre' => 'Luis', 'apellido' => 'Morales', 'email' => 'luis.morales@demo.com', 'telefono' => '5510010005'],
            ['nombre' => 'Camila', 'apellido' => 'Nunez', 'email' => 'camila.nunez@demo.com', 'telefono' => '5510010006'],
            ['nombre' => 'Hector', 'apellido' => 'Salazar', 'email' => 'hector.salazar@demo.com', 'telefono' => '5510010007'],
            ['nombre' => 'Paola', 'apellido' => 'Ibarra', 'email' => 'paola.ibarra@demo.com', 'telefono' => '5510010008'],
            ['nombre' => 'Ivan', 'apellido' => 'Ortega', 'email' => 'ivan.ortega@demo.com', 'telefono' => '5510010009'],
            ['nombre' => 'Renata', 'apellido' => 'Gil', 'email' => 'renata.gil@demo.com', 'telefono' => '5510010010'],
        ];

        foreach ($asistentes as $asistente) {
            $asistente['evento_id'] = $eventoIds[array_rand($eventoIds)];
            Asistente::create($asistente);
        }
    }
}
