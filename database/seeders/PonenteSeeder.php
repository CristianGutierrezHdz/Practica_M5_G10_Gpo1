<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Ponente;
use Illuminate\Database\Seeder;

class PonenteSeeder extends Seeder
{
    public function run(): void
    {
        $eventoIds = Evento::query()->pluck('id')->all();

        if (empty($eventoIds)) {
            return;
        }

        $ponentes = [
            ['nombre' => 'Carlos', 'apellido' => 'Mendez', 'email' => 'carlos.mendez@demo.com', 'especialidad' => 'Transformacion digital'],
            ['nombre' => 'Laura', 'apellido' => 'Rios', 'email' => 'laura.rios@demo.com', 'especialidad' => 'Gobierno abierto'],
            ['nombre' => 'Miguel', 'apellido' => 'Santos', 'email' => 'miguel.santos@demo.com', 'especialidad' => 'Ciberseguridad'],
            ['nombre' => 'Ana', 'apellido' => 'Torres', 'email' => 'ana.torres@demo.com', 'especialidad' => 'Gestion de proyectos'],
            ['nombre' => 'Jorge', 'apellido' => 'Lopez', 'email' => 'jorge.lopez@demo.com', 'especialidad' => 'Analitica de datos'],
            ['nombre' => 'Patricia', 'apellido' => 'Navarro', 'email' => 'patricia.navarro@demo.com', 'especialidad' => 'Participacion ciudadana'],
            ['nombre' => 'Ricardo', 'apellido' => 'Vega', 'email' => 'ricardo.vega@demo.com', 'especialidad' => 'Planeacion estrategica'],
            ['nombre' => 'Elena', 'apellido' => 'Castro', 'email' => 'elena.castro@demo.com', 'especialidad' => 'Atencion ciudadana'],
            ['nombre' => 'Fernando', 'apellido' => 'Pineda', 'email' => 'fernando.pineda@demo.com', 'especialidad' => 'Innovacion publica'],
            ['nombre' => 'Sofia', 'apellido' => 'Herrera', 'email' => 'sofia.herrera@demo.com', 'especialidad' => 'Transparencia'],
        ];

        foreach ($ponentes as $ponente) {
            $ponente['evento_id'] = $eventoIds[array_rand($eventoIds)];
            Ponente::create($ponente);
        }
    }
}
