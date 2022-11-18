<?php

namespace PauloFelipeM\BrazilianRegions\Database\Seeds;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
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
        $result = $client->get($enpoints['city_url'], [
            'headers' => config('brazilianregions.headers'),
        ]);
        $cities = $result->getBody()->getContents();

        $data = [];
        foreach (json_decode($cities, false, 512, JSON_THROW_ON_ERROR) as $city) {
            $data[] = [
                'id' => $city->id,
                'name' => $city->nome,
                'state_id' => $city->microrregiao->mesorregiao->UF->id,
            ];
        }

        DB::table('cities')->insert($data);
    }
}
