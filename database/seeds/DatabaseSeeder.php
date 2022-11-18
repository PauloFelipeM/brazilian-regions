<?php

namespace PauloFelipeM\BrazilianRegions\Database\Seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            CountryTableSeeder::class,
            StateTableSeeder::class,
            CityTableSeeder::class,
        ]);
    }
}
