<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materias')->insert([

            'materia'  => 'Ingles I',
            'seccion_id' => '1',
            'persona_id' => '1'
        ]);
    }
}
