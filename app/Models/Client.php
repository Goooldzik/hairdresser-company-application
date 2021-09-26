<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'phone_number',
        'email'
    ];

    /**
     * @return BelongsTo
     */
    public function hairdresser(): BelongsTo
    {
        return $this->belongsTo(Hairdresser::class);
    }

    /**
     * @return HasMany
     */
    public function library(): HasMany
    {
        return $this->hasMany(ClientLibrary::class);
    }

    /**
     * @return HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
