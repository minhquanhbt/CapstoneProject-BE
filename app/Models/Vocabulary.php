<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(Kanjis::class);
    }

    public function meaningVietnamese(): BelongsToMany
    {
        return $this->hasMany(MeaningVietnamese::class);
    }

    public function exampleVietnamese(): BelongsToMany
    {
        return $this->hasManyThrough(ExampleVietnamese::class,MeaningVietnamese::class);
    }
}
