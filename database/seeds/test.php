<?php

use Illuminate\Database\Seeder;

class test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materias = array("Ingles I", "Ingles II");

        for ($i=0; $i < count($materias); $i++) { 

            DB::table('materias')->insert([

                'materia'  => $materias[$i],
            ]);
        }

        $periodos = array("2016-I", "2016-II","2016-III","2017-I", "2017-II","2017-III");

        for ($i=0; $i < count($periodos); $i++) { 

            DB::table('periodos')->insert([

                'periodo'  => $periodos[$i],
            ]);
        }

        DB::table('users')->insert([

                'name'  => 'estudiante',
                'email'  => 'estudiante@example.com',
                'password'  => bcrypt('estudiante'),
                'tipo' => 'Estudiante',
                'estado' => 'Activo'
        ]);

        DB::table('personas')->insert([

                'nombre'  => 'Estudiante',
                'apellido'  => 'Estudiante',
                'cedula'  => '00000001',
                'foto' => 'img/fotos/estudiante.jpg',
                'user_id' => '1'
        ]);

        DB::table('estudiantes')->insert([
                'materia_id'  => '1',
                'periodo_id'  => '1',
                'estudiante_id'  => '1',
        ]);

    }
}