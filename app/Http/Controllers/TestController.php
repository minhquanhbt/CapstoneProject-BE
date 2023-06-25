<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kanji;
use App\Models\Learned;
use App\Models\missPronounces;
use App\Models\Vocabulary;
use App\Models\User;

class TestController extends BaseController
{
    //Test Request
    
    public function Test(){
        try{
            $current = Auth::user();
            return $this->makeQuest(30, $current);

        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    // make question
    private function makeQuest($number, $user){
        $kanjis_learned = Learned::where('learnable_type', 'App\Models\Kanji')->where('user_id', $user->id)->get();
        $vocabularies_learned = Learned::where('learnable_type', 'App\Models\Vocabulary')->where('user_id', $user->id)->get();
        $vocabularies = Vocabulary::where('Level','>=',$user->level)->get();
        $kanjis = Kanji::with('pronounces')->where('Level','>=',$user->level)->get();
        if(!$kanjis_learned->isEmpty()){
            foreach($kanjis_learned as $learned){
                $tmp = Kanji::with('pronounces')->where('id', $learned->learnable_id)->get();
                $kanjis = $kanjis->merge($tmp);
                $kanjis = $kanjis->unique('id');
            }
        }
        if(!$vocabularies_learned->isEmpty()){
            foreach($vocabularies_learned as $learned){
                $tmp = Vocabulary::where('id', $learned->learnable_id)->get();
                $vocabularies = $vocabularies->merge($tmp);
                $vocabularies = $vocabularies->unique('id');
            }
        }
        $collection = new Collection;
        for($x = 0; $x < $number; $x++){
            $type = rand(0,1);
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
                $result = $result->shuffle();
                $temp = collect(["question" => $res[0]->character]);
                for($i = 0; $i < 4; $i++){
                    $arr[$i] = ($result[$i]->pronounces[0]->Hiragana?$result[$i]->pronounces[0]->Hiragana:$result[$i]->pronounces[0]->Katakana);
                }
                $temp = $temp->merge(["option" => $arr]);
                $temp = $temp->merge(["type" => 'kanji']);
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
                $result = $result->shuffle();
                $temp = collect(["question" => $res[0]->word]);
                for($i = 0; $i < 4; $i++){
                    $arr[$i] = $result[$i]->pronounce;
                }
                $temp = $temp->merge(["option" => $arr]);
                $temp = $temp->merge(["type" => 'vocabulary']);
                $collection->push($temp);
            }
        }
        return $collection;
    }

    //Check Answer
    public function TestResult(Request $request){
        try{
            $current = Auth::user();
            $res = new Collection;
            foreach($request->data as $data){
                $answer = $data[1];
                if (!$answer) {
                    $answer = '?';
                }
                list($result, $right) = $this->PointCalc($current, $data[0], $answer, $data[2]);
                $res->push(
                    ['result'=>$result,'question'=>$data[0], 'right'=>$right, 'answer'=>$data[1]]
                );
            }
            return $res;
        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    //calc Point
    private function PointCalc($user, $question, $answer, $type){
        $Qa = pow(10,$user->point/4000);
        $result = false;
        if($type == 'kanji'){
            $question = Kanji::where('character', $question)->first();
            $right = $question->pronounces[0]->Katakana;
            for($i=0; $i < count($question->pronounces); $i++){
                if(($question->pronounces[$i]->Katakana == $answer)){
                    $result = true;
                    $right = $question->pronounces[$i]->Katakana;
                    break;
                }
                if(($question->pronounces[$i]->Hiragana == $answer)){
                    $result = true;
                    $right = $question->pronounces[$i]->Hiragana;
                    break;
                }
            }
        }
        else{
            $question = Vocabulary::where('word', $question)->first();
            $right = $question->pronounce;
            if($question->pronounce == $answer){
                $result = true;
            }
        } 
        switch ($question->level){
            case 5:
                $Qb = pow(10,USER::LV_N5/4000);
                break;
            case 4:
                $Qb = pow(10,USER::LV_N4/4000);
                break;
            case 3:
                $Qb = pow(10,USER::LV_N3/4000);
                break;
            case 2:
                $Qb = pow(10,USER::LV_N2/4000);
                break;
            case 1:
                $Qb = pow(10,USER::LV_N1/4000);
                break;
        }
        switch ($user->level){
            case 5:
                $k = 25;
                break;
            case 4:
                $k = 20;
                break;
            case 3:
                $k = 15;
                break;
            case 2:
                $k = 10;
                break;
            case 1:
                $k = 5;
                break;
        }
        $Ea = $Qa/($Qa+$Qb);
        if($result){
            $Aa=2;
        }
        else{
            $Aa=0;
        }
        $point = $k*($Aa-$Ea);
	    $Ra = $user->point + $point;
        if($Ra>=0){
            if($type == 'kanji'){
                $leanred = Kanji::where('character', $question->character)->first();
                if(Learned::where('user_id', $user->id)->where('seen',true)->where('remember',true)
                    ->where('learnable_id',$leanred->id)->where('learnable_type','App\Models\Kanji')->first()){
                    return [$result, $right];
                }
            }
            else{
                $leanred = Vocabulary::where('word', $question->word)->first();
                if(Learned::where('user_id', $user->id)->where('seen',true)->where('remember',true)
                    ->where('learnable_id',$leanred->id)->where('learnable_type','App\Models\Vocabulary')->first()){
                    return [$result, $right];
                }
            }
        }
        $user = User::find($user->id);
        $user->point = round($Ra);
        $user->save();
        if($Ra>=User::LV_N1){
            $lvl = 1;
        }
        if($Ra<User::LV_N1){
            $lvl = 2;
        }
        if($Ra<User::LV_N2){
            $lvl = 3;
        }
        if($Ra<User::LV_N3){
            $lvl = 4;
        }
        if($Ra<User::LV_N4){
            $lvl = 5;
        }
        $user->level = round($lvl);
        $user->save();
        $word_learned = new Learned;
        $word_learned->user_id = $user->id;
        $word_learned->seen = true;
        $word_learned->remember = $result;
        $word_learned->point = round($point);
        $word_learned->learned_date = \Carbon\Carbon::now();
        $word_learned->learnable()->associate($leanred)->save();
        return [$result, $right];
    }

    
    
    public function Exam($level){
        try{
            return $this->makeExamQuest(40, $level);

        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    // make exam question
    private function makeExamQuest($number, $level){
        $vocabularies = Vocabulary::where('Level','>=',$level)->get();
        $kanjis = Kanji::with('pronounces')->where('Level','>=',$level)->get();
        $collection = new Collection;
        for($x = 0; $x < $number; $x++){
            $type = rand(0,1);
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
                $result = $result->shuffle();
                $temp = collect(["question" => $res[0]->character]);
                for($i = 0; $i < 4; $i++){
                    $arr[$i] = ($result[$i]->pronounces[0]->Hiragana?$result[$i]->pronounces[0]->Hiragana:$result[$i]->pronounces[0]->Katakana);
                }
                $temp = $temp->merge(["option" => $arr]);
                $temp = $temp->merge(["type" => 'kanji']);
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
                $result = $result->shuffle();
                $temp = collect(["question" => $res[0]->word]);
                for($i = 0; $i < 4; $i++){
                    $arr[$i] = $result[$i]->pronounce;
                }
                $temp = $temp->merge(["option" => $arr]);
                $temp = $temp->merge(["type" => 'vocabulary']);
                $collection->push($temp);
            }
        }
        return $collection;
    }

    

    //Check Answer
    public function ExamResult(Request $request){
        try{
            $current = Auth::user();
            $res = new Collection;
            $point = 0;
            foreach($request->data as $data){
                list($result, $right) = $this->PointCalc($current, $data[0], $data[1], $data[2]);
                if($result){$point++;}
                $res->push(
                    ['result'=>$result,'question'=>$data[0], 'right'=>$right, 'answer'=>$data[1]]
                );
            }
            return ['point' => $point, 'result' => $res];
        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
