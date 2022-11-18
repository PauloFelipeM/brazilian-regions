# Laravel — Migrations e seeders de todos os paises, estados e cidades (Estados e cidades brasileiras).

[![Latest Version on Packagist](https://img.shields.io/badge/packagist-1.0.0-blue)](https://packagist.org/packages/paulofelipem/brazilian-regions)
[![Total Downloads](https://img.shields.io/packagist/dt/PauloFelipeM/brazilian-regions)](https://packagist.org/packages/paulofelipem/brazilian-regions)

Neste repositório encontram-se migrations e seeders necessários para criação de tabelas de países, estados e cidades (Apenas estados e cidades brasileiras).

Esses dados são alimentados atráves
da [API de serviço de dados do IBGE.](https://servicodados.ibge.gov.br/api/docs/localidades)

## Requeriments

- PHP 8.1+
- Laravel 9.0+

## Instalação

Este pacote publica um arquivo config/brazilianregions.php. Se você já tiver um arquivo com esse nome, deverá renomeá-lo
ou removê-lo.

Você pode instalar o pacote via composer:

```bash
composer require PauloFelipeM/brazilian-regions
```

O provedor de serviços será registrado automaticamente. Ou você pode adicionar manualmente o provedor de serviços em seu
arquivo config/app.php:

```bash
'providers' => [
  // ...
  PauloFelipeM\BrazilianRegions\BrazilianRegionsServiceProvider::class,
];
```

Você deve publicar a migração e o arquivo de configuração config/permission.php com:

```bash
php artisan vendor:publish --provider="PauloFelipeM\BrazilianRegions\BrazilianRegionsServiceProvider"
```

## Uso

Após a instalação, você deve executar os comandos de migrations e seeders:

```bash
php artisan migrate
php artisan db:seed --class="PauloFelipeM\\BrazilianRegions\\Database\\Seeds\\DatabaseSeeder"
```

## Tabelas

A tabela `countries` contém:

- m_49: ID
- acronym: SIGLA
- name: NOME
- region: REGIÃO

A tabela `states` contém:

- acronym: SIGLA
- name: NOME
- region: REGIÃO
- region_acronym: SIGLA REGIÃO

A tabela `cities` contém:

- name: NOME

### Changelog

Veja [CHANGELOG](CHANGELOG.md) para mais informações.

### Bugs

Se você identificar alguma falha, por favor abra uma issue no Github.

## Creditos

- [Paulo Felipe Martins](https://github.com/PauloFelipeM)

## Licença

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
