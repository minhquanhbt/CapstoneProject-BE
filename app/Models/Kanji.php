<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function learned(): MorphOne
    {
        return $this->morphOne(Learned::class, 'learnable');
    }

    public function pronounce(): HasMany
    {
        return $this->hasMany(Pronounce::class);
    }

    public function vocabularies(): BelongsToMany
    {
        return $this->belongsToMany(Vocabularies::class);
    }
}
