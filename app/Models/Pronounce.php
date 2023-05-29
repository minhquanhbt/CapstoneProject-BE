<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronouce extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kanji(){
        return $this->belongsTo(Kanji::class);
    }

}
