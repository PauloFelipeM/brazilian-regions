<?php

namespace PauloFelipeM\BrazilianRegions\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $timestamps = false;

    public function cities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(
            config('brazilianregions.models.city'),
            config('brazilianregions.column_names.city_key'),
        );
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(
            config('brazilianregions.models.country'),
            config('brazilianregions.column_names.country_key'),
        );
    }
}
