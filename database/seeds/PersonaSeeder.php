<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

                'email'  => 'admin@example.com',
                'password'  => bcrypt('admin'),
                'tipo' => 'Admin',
                'estado' => 'Activo'
        ]);

        DB::table('users')->insert([

                'email'  => 'profesor@example.com',
                'password'  => bcrypt('profesor'),
                'tipo' => 'Profesor',
                'estado' => 'Activo'
        ]);

        DB::table('personas')->insert([

                'nombre'  => 'Profesor',
                'apellido'  => 'Profesor',
                'cedula'  => '00000001',
                'foto' => 'img/fotos/profesor.jpg',
                'user_id' => '2'
        ]);
    }
}
