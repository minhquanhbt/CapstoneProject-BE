<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kanji;
use App\Models\Vocabulary;

class KanjiController extends Controller
{
    public function getMainInfo(){
        try{
            return ['data' => Kanji::all()];

        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
