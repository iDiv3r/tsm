<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotelService extends Model
{
    use HasFactory;

    

    # Belongs to -----------------------------------------------------------------------------------------------------

    public function services(): BelongsTo 
    {
        return $this->belongsTo(Service::class);
    }

    public function hotels(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

}
