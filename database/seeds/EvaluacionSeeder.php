<?php

use Illuminate\Database\Seeder;

class EvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('evaluacions')->insert([
                'titulo'  => 'Test',
                'descripcion'  => 'Test',
                'tipo'  => 'Prueba',
                'materia_id'  => '1',
                'estado'  => 'Activo',
        ]);

    }
}
