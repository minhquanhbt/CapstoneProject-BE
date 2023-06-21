<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kanji extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function learned(): MorphOne
    {
        return $this->morphOne(Learned::class, 'learnable');
    }

    public function pronounces(): HasMany
    {
        return $this->hasMany(Pronounce::class);
    }

    public function vocabularies(): BelongsToMany
    {
        return $this->belongsToMany(Vocabulary::class);
    }
}
