<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FlightsDates extends Model
{
    use HasFactory;

    # Belongs to --------------------------------------------------------------------------------------------------------------------

    public function flights(): BelongsTo
    {
        return $this->belongsTo(Flight::class);
    }

    
    # Has many --------------------------------------------------------------------------------------------------------------------
    
    public function categoriesFlights(): HasMany
    {
        return $this->hasMany(CategoriesFlights::class);
    }

    // public function ():
    // {
    //     return $this->
    // }
}
