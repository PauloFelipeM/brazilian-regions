<?php

namespace PauloFelipeM\BrazilianRegions\Database\Seeds;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTableSeeder extends Seeder
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
        $result = $client->get($enpoints['country_url'], [
            'headers' => config('brazilianregions.headers'),
        ]);
        $countries = $result->getBody()->getContents();

        $data = [];
        foreach (json_decode($countries, false, 512, JSON_THROW_ON_ERROR) as $country) {
            $data[] = [
                'm_49' => $country->id['M49'],
                'acronym' => $country->id['ISO-ALPHA-3'],
                'name' => $country->nome,
                'region' => $country['sub-regiao']['nome'],
            ];
        }

        DB::table('countries')->insert($data);
    }
}
