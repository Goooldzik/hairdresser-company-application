<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HairdresserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'hairdresser_id',
        'description',
        'photo_path'
    ];

    /**
     * @return BelongsTo
     */
    public function hairdresser(): BelongsTo
    {
        return $this->belongsTo(Hairdresser::class);
    }
}
