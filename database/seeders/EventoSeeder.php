<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    public function run(): void
    {
        $eventos = [
            [
                'titulo' => 'Foro de Innovacion Publica',
                'descripcion' => 'Intercambio de ideas para modernizar servicios publicos.',
                'fecha_inicio' => '2026-05-10',
                'fecha_fin' => '2026-05-12',
                'ubicacion' => 'Ciudad de Mexico',
            ],
            [
                'titulo' => 'Congreso de Gobierno Digital',
                'descripcion' => 'Buenas practicas de transformacion digital en instituciones.',
                'fecha_inicio' => '2026-06-01',
                'fecha_fin' => '2026-06-03',
                'ubicacion' => 'Guadalajara',
            ],
            [
                'titulo' => 'Seminario de Transparencia',
                'descripcion' => 'Herramientas y normativa para fortalecer la rendicion de cuentas.',
                'fecha_inicio' => '2026-06-15',
                'fecha_fin' => '2026-06-16',
                'ubicacion' => 'Monterrey',
            ],
            [
                'titulo' => 'Encuentro de Liderazgo Local',
                'descripcion' => 'Estrategias para liderar equipos municipales de alto desempeno.',
                'fecha_inicio' => '2026-07-02',
                'fecha_fin' => '2026-07-04',
                'ubicacion' => 'Merida',
            ],
            [
                'titulo' => 'Jornada de Participacion Ciudadana',
                'descripcion' => 'Metodos para involucrar a la ciudadania en decisiones publicas.',
                'fecha_inicio' => '2026-07-20',
                'fecha_fin' => '2026-07-21',
                'ubicacion' => 'Puebla',
            ],
            [
                'titulo' => 'Taller de Gestion de Proyectos',
                'descripcion' => 'Planeacion y seguimiento de proyectos con enfoque de resultados.',
                'fecha_inicio' => '2026-08-05',
                'fecha_fin' => '2026-08-06',
                'ubicacion' => 'Queretaro',
            ],
            [
                'titulo' => 'Simposio de Datos Abiertos',
                'descripcion' => 'Uso y publicacion de datos para mejorar politicas publicas.',
                'fecha_inicio' => '2026-08-18',
                'fecha_fin' => '2026-08-19',
                'ubicacion' => 'Tijuana',
            ],
            [
                'titulo' => 'Foro de Atencion Ciudadana',
                'descripcion' => 'Modelos de servicio para elevar la satisfaccion del usuario.',
                'fecha_inicio' => '2026-09-03',
                'fecha_fin' => '2026-09-04',
                'ubicacion' => 'Leon',
            ],
            [
                'titulo' => 'Cumbre de Seguridad Digital',
                'descripcion' => 'Prevencion de riesgos y continuidad operativa en plataformas.',
                'fecha_inicio' => '2026-09-17',
                'fecha_fin' => '2026-09-18',
                'ubicacion' => 'Chihuahua',
            ],
            [
                'titulo' => 'Dialogo de Planeacion Estrategica',
                'descripcion' => 'Diseno de objetivos institucionales medibles y sostenibles.',
                'fecha_inicio' => '2026-10-01',
                'fecha_fin' => '2026-10-02',
                'ubicacion' => 'Oaxaca',
            ],
        ];

        Evento::insert($eventos);
    }
}
