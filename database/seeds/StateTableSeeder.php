<?php

namespace PauloFelipeM\BrazilianRegions\Database\Seeds;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function run(): void
    {
        $client = new Client();
        $enpoints = config('brazilianregions.enpoints');
        $result = $client->get($enpoints['state_url'], [
            'headers' => config('brazilianregions.headers'),
        ]);
        $states = $result->getBody()->getContents();
        $brazil = DB::table('countries')->where('acronym', 'BRA')->first();

        $data = [];
        foreach (json_decode($states, false, 512, JSON_THROW_ON_ERROR) as $state) {
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
