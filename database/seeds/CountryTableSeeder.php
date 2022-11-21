<?php

namespace PauloFelipeM\BrazilianRegions\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     * @throws \JsonException
     */
    public function run(): void
    {
        $file = file_get_contents(__DIR__ . '/../../resources/countries.json');
        $countries = json_decode($file, false, 512, JSON_THROW_ON_ERROR);
        $tableNames = config('brazilianregions.table_names');

        $data = [];
        foreach ($countries as $country) {
            $data[] = [
                'm_49' => $country->id->M49,
                'acronym' => $country->id->{'ISO-ALPHA-3'},
                'name' => $country->nome,
                'region' => $country->{'sub-regiao'}->nome,
            ];
        }

        DB::table($tableNames['country'])->insert($data);
    }
}
