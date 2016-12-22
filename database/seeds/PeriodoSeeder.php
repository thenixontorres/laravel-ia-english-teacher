<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodos')->insert([

            'periodo'  => '2016-I'
        ]);

        DB::table('periodos')->insert([

            'periodo'  => '2016-II'
        ]);

        DB::table('periodos')->insert([

            'periodo'  => '2016-III'
        ]);
    }
}
