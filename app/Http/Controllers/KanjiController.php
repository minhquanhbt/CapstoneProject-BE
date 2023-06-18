<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kanji;
use App\Models\missPronounces;
use App\Models\Vocabulary;

class KanjiController extends Controller
{
    public function getMainLogedInfo(){
        $current = Auth::user();
        $kanjis = Kanji::where('level','>=',$current->level)->get();
        $vocabularies = Vocabulary::where('Level','>=',$current->level)->get();
        $kanji_res = $kanjis->random(10);
        $vocabulary_res = $vocabularies->random(5);
        $result = new Collection;
        $result = $result->merge($kanji_res);
        $result = $result->merge($vocabulary_res);
        try{
            return ['data' => $result];

        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
    public function getMainInfo(){
        $kanjis = Kanji::with('pronounces')->get();
        $vocabularies = Vocabulary::with('meaningVietnamese')->get();
        $kanji_res = $kanjis->random(10);
        $vocabulary_res = $vocabularies->random(5);
        $result = new Collection;
        $result = $result->merge($kanji_res);
        $result = $result->merge($vocabulary_res);
        try{
            return ['data' => $result];

        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    // make question
    private function makeQuest($number){
        $vocabularies = Vocabulary::all();
        $kanjis = Kanji::with('pronounces')->get();
        $collection = new Collection;
        for($x = 0; $x < $number; $x++){
            $type = 1;
            //kanji
            if($type===0){
                $res = $kanjis->random(1);
                $kanjis->reject(function ($kanjis) use($res) {
                    return $kanjis == $res;
                });
                $option = $kanjis->random(3);
                $result = new Collection;
                $result = $result->merge($res);
                $result = $result->merge($option);
                $result->shuffle();
                $temp = collect(["question" => $res[0]->character]);
                for($i = 0; $i < 4; $i++){
                    $arr[$i] = ($result[$i]->pronounces[0]->Hiragana?$result[$i]->pronounces[0]->Hiragana:$result[$i]->pronounces[0]->Katakana);
                }
                $temp = $temp->merge(["option" => $arr]);
                $collection->push($temp);
            }
            //vocabulary
            else{
                $res = $vocabularies->random(1);
                $vocabularies->reject(function ($vocabularies) use($res) {
                    return $vocabularies == $res;
                });
                $option = missPronounces::where('vocabulary_id',$res[0]->id)->get()->random(3);
                $result = new Collection;
                $result = $result->merge($res);
                $result = $result->merge($option);
                $result->shuffle();
                $temp = collect(["question" => $res[0]->word]);
                for($i = 0; $i < 4; $i++){
                    $arr[$i] = $result[$i]->pronounce;
                }
                $temp = $temp->merge(["option" => $arr]);
                $collection->push($temp);
            }
        }
        return $collection;
    }

    //Quiz Request
    
    public function Quiz(){
        try{
            return $this->makeQuest(1);

        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
