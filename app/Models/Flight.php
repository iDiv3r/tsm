<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Flight extends Model
{
    use HasFactory;

    
    # Belongs to --------------------------------------------------------------------

    public function airline(): BelongsTo
    {
        return $this->belongsTo(Airline::class);
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function destiny(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }


    # Has Many  --------------------------------------------------------------------

    public function stopovers(): HasMany
    {
        return $this->hasMany(Stopover::class);
    }

    public function flightsDates(): HasMany
    {
        return $this->hasMany(FlightsDates::class);
    }


    // public function ():
    // {
    //     return $this
    // }
}
