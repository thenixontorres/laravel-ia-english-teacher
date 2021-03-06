<?php

use Illuminate\Database\Seeder;

class ReaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reaccions')->insert([
                'titulo'  => 'Neutral',
                'reaccion'  => 'img/reaccions/neutral.png',
        ]);

        DB::table('reaccions')->insert([
                'titulo'  => 'Molesto',
                'reaccion'  => 'img/reaccions/molesto.png',
        ]);

        DB::table('reaccions')->insert([
                'titulo'  => 'Confuso',
                'reaccion'  => 'img/reaccions/confuso.png',
        ]);

        DB::table('reaccions')->insert([
                'titulo'  => 'Alegre',
                'reaccion'  => 'img/reaccions/alegre.png',
        ]);

        DB::table('reaccions')->insert([
                'titulo'  => 'Ofendido',
                'reaccion'  => 'img/reaccions/ofendido.png',
        ]);

        DB::table('reaccions')->insert([
                'titulo'  => 'Sorprendido',
                'reaccion'  => 'img/reaccions/sorprendido.png',
        ]);

        DB::table('reaccions')->insert([
                'titulo'  => 'Triste',
                'reaccion'  => 'img/reaccions/triste.png',
        ]);
    }
}
