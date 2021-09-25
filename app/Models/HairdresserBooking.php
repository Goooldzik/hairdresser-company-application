<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HairdresserBooking extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function hairdresser(): BelongsTo
    {
        return $this->belongsTo(Hairdresser::class);
    }
}
