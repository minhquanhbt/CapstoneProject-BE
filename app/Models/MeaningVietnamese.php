<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MeaningVietnamese extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vocabulary(): BelongsTo
    {
        return $this->belongsTo(Vocabulary::class);
    }
    public function exampleVietnamese(): HasMany
    {
        return $this->hasMany(ExampleVietnamese::class);
    }
}
