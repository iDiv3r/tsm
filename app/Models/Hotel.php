<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hotel extends Model
{
    use HasFactory;

    # Belongs to ----------------------------------------------------------------------------------------

    public function cities(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
