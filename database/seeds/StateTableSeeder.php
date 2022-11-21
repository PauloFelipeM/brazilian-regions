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
        $tableNames = config('brazilianregions.table_names');
        $columnNames = config('brazilianregions.column_names');

        $brazil = DB::table($tableNames['country'])->where('acronym', 'BRA')->first();
        $data = [];
        foreach ($states as $state) {
            $data[] = [
                'id' => $state->id,
                'name' => $state->nome,
                'acronym' => $state->sigla,
                'region' => $state->regiao->nome,
                'region_acronym' => $state->regiao->sigla,
                $columnNames['country_key'] => $brazil->id,
            ];
        }

        DB::table($tableNames['state'])->insert($data);
    }
}
