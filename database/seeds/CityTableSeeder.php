<?php

namespace PauloFelipeM\BrazilianRegions\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     * @throws \JsonException
     */
    public function run(): void
    {
        $file = file_get_contents(__DIR__ . '/../../resources/cities.json');
        $cities = json_decode($file, false, 512, JSON_THROW_ON_ERROR);
        $data = [];
        foreach ($cities as $city) {
            $data[] = [
                'id' => $city->id,
                'name' => $city->nome,
                'state_id' => $city->microrregiao->mesorregiao->UF->id,
            ];
        }

        DB::table('cities')->insert($data);
    }
}
