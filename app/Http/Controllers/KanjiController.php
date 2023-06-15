<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kanji;
use App\Models\Vocabulary;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class KanjiController extends Controller
{
    public function getMainInfo(){
        $current = Auth::user();
        if($current){
            $kanjis = Kanji::where('level','<=',$current->level);
            $vocabularies = Vocabulary::where('Level','<=',$current->level);
        }
        else{
            $kanjis = Kanji::all();
            $vocabularies = Vocabulary::all();
        }
        $kanji_res = $kanjis->random(5);
        $vocabulary_res = $vocabularies->random(5);
        $result = new \Illuminate\Database\Eloquent\Collection;
        $result = $result->merge($kanji_res);
        $result = $result->merge($vocabulary_res);
        try{
            return ['data' => $result];

        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
