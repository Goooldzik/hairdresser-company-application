<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientLibrary extends Model
{
    use HasFactory;

    protected $fillable = [
        'hairdresser_id',
        'client_id',
        'content',
        'client_library_number',
        'created_at',
        'updated_at'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function hairdresser(): BelongsTo
    {
        return $this->belongsTo(Hairdresser::class);
    }
}
