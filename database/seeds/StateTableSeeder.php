<?php

namespace PauloFelipeM\BrazilianRegions\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     * @throws \JsonException
     */
    public function run(): void
    {
        $file = file_get_contents(__DIR__ . '/../../resources/states.json');
        $states = json_decode($file, false, 512, JSON_THROW_ON_ERROR);
        $brazil = DB::table('countries')->where('acronym', 'BRA')->first();
        $data = [];
        foreach ($states as $state) {
            $data[] = [
                'id' => $state->id,
                'name' => $state->nome,
                'acronym' => $state->sigla,
                'region' => $state->regiao->nome,
                'region_acronym' => $state->regiao->sigla,
                'country_id' => $brazil->id,
            ];
        }

        DB::table('states')->insert($data);
    }
}
