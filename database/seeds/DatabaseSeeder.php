<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

            $this->call(PersonaSeeder::class);
            $this->call(SeccionSeeder::class);
            $this->call(MateriaSeeder::class);
            $this->call(PeriodoSeeder::class);
            $this->call(ReaccionSeeder::class);
            $this->call(EvaluacionSeeder::class);

        Model::reguard();
    }
}
