<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seccions')->insert([

            'seccion'  => 'I',
        ]);

        DB::table('seccions')->insert([

            'seccion'  => 'II',
        ]);

        DB::table('seccions')->insert([

            'seccion'  => 'III',
        ]);
    }
}
