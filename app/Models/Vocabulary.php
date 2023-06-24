<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Vocabulary extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function learned(): MorphOne
    {
        return $this->morphOne(Learned::class, 'learnable');
    }

    public function kanjis(): BelongsToMany
    {
        return $this->belongsToMany(Kanji::class);
    }

    public function missPronounces(): HasMany
    {
        return $this->hasMany(missPronounces::class);
    }

    public function meaningVietnamese(): HasMany
    {
        return $this->hasMany(MeaningVietnamese::class);
    }

    public function exampleVietnamese(): HasManyThrough
    {
        return $this->hasManyThrough(ExampleVietnamese::class,MeaningVietnamese::class);
    }
}
