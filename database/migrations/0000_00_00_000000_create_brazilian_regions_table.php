<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrazilianRegionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $tableNames = config('brazilianregions.table_names');
        $columnNames = config('brazilianregions.column_names');

        if (empty($tableNames)) {
            throw new \RuntimeException('Error: config/brazilianregions.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::create($tableNames['country'], static function (Blueprint $table) {
            $table->id();
            $table->string('m_49');
            $table->string('acronym');
            $table->string('name');
            $table->string('region');
        });

        Schema::create($tableNames['state'], static function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->id();
            $table->string('acronym');
            $table->string('name');
            $table->string('region');
            $table->string('region_acronym');
            $table->foreignId($columnNames['country_key'])->constrained($tableNames['country'])->cascadeOnDelete();
        });

        Schema::create($tableNames['city'], static function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->id();
            $table->string('name');
            $table->foreignId($columnNames['state_key'])->constrained($tableNames['state'])->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function down(): void
    {
        $tableNames = config('brazilianregions.table_names');

        if (empty($tableNames)) {
            throw new \RuntimeException('Error: config/brazilianregions.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::dropIfExists($tableNames['city']);
        Schema::dropIfExists($tableNames['state']);
        Schema::dropIfExists($tableNames['country']);
    }
}
