<?php

namespace PauloFelipeM\BrazilianRegions\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(
            config('brazilianregions.models.state'),
            config('brazilianregions.column_names.state_key'),
        );
    }
}
