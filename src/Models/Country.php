<?php

namespace PauloFelipeM\BrazilianRegions\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    public function states(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(
            config('brazilianregions.models.state'),
            config('brazilianregions.column_names.state_key'),
        );
    }
}
