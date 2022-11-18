<?php
return [
    /**
     * Versão da aplicação
     */
    'version' => '1.0.0',

    /**
     * URLs do IBGE com as rotas de paises, estados e cidades
     */
    'endpoints' => [
        'country_url' => 'https://servicodados.ibge.gov.br/api/v1/localidades/paises',

        'state_url' => 'https://servicodados.ibge.gov.br/api/v1/localidades/estados',

        'city_url' => 'https://servicodados.ibge.gov.br/api/v1/localidades/municipios',
    ],

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

    /**
     * headers usado no guzzle para requisição da API do IBGE
     */
    'headers' => [
        'Accept: application/json',
        'Content-Type: application/json',
    ],
];