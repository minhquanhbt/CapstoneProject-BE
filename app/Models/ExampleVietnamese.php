<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExampleVietnamese extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function meaningVietnamese(): BelongsTo
    {
        return $this->belongsTo(MeaningVietnamese::class);
    }
}
