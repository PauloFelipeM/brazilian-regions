<?php
return [
    'version' => '1.0.0',

    'endpoints' => [
        'country_url' => 'https://servicodados.ibge.gov.br/api/v1/localidades/paises',

        'state_url' => 'https://servicodados.ibge.gov.br/api/v1/localidades/estados',

        'city_url' => 'https://servicodados.ibge.gov.br/api/v1/localidades/municipios',
    ],

    'models' => [
        'country' => \PauloFelipeM\BrazilianRegions\Models\Country::class,

        'state' => \PauloFelipeM\BrazilianRegions\Models\State::class,

        'city' => \PauloFelipeM\BrazilianRegions\Models\City::class,
    ],

    'table_names' => [
        'country' => 'countries',

        'state' => 'states',

        'city' => 'cities',
    ],

    'column_names' => [
        'country_key' => 'country_id',

        'state_key' => 'state_id',

        'city_key' => 'city_id',
    ],

    'headers' => [
        'Accept: application/json',
        'Content-Type: application/json',
    ],
];