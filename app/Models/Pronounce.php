<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronounce extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kanji(): BelongsTo
    {
        return $this->belongsTo(Kanji::class);
    }
}
