<?php
return [
    /**
     * Versão da aplicação
     */
    'version' => '1.0.20',

    /**
     * Models padrões, é possível criar novas models e apontar no config
     */
    'models' => [
        'country' => \PauloFelipeM\BrazilianRegions\Models\Country::class,

        'state' => \PauloFelipeM\BrazilianRegions\Models\State::class,

        'city' => \PauloFelipeM\BrazilianRegions\Models\City::class,
    ],

    /**
     * Nomes das tabelas
     */
    'table_names' => [
        'country' => 'countries',

        'state' => 'states',

        'city' => 'cities',
    ],

    /**
     * Nomes das colunas de relacionamentos,
     */
    'column_names' => [
        'country_key' => 'country_id',

        'state_key' => 'state_id',

        'city_key' => 'city_id',
    ],
];