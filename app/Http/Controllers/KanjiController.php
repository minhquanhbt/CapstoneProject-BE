<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kanji;
use App\Models\Learned;
use App\Models\Pronounce;
use App\Models\missPronounces;
use App\Models\Vocabulary;
use App\Models\User;
use Validator;

class KanjiController extends BaseController
{
    public function getMainLogedInfo(){
        $current = Auth::user();
        $kanjis = Kanji::with('pronounces')->where('level','>=',$current->level)->get();
        $vocabularies = Vocabulary::with('meaningVietnamese')->where('Level','>=',$current->level)->get();
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

    //get Kanji Detail
    
    public function getDetail(Request $request){
        $kanji = Kanji::with('pronounces')->with('vocabularies')->find($request->kanji_id);
        try{
            if($request->user_id){
                if(!(Learned::where('learnable_type','App\Models\Kanji')->where('learnable_id',$kanji->id)->where('user_id',$request->user_id)->exists()))
                {
                    $word_learned = new Learned;
                    $word_learned->user_id = $request->user_id;
                    $word_learned->seen = true;
                    $word_learned->remember = false;    
                    $word_learned->point = 0;
                    $word_learned->learned_date = \Carbon\Carbon::now();
                    $word_learned->learnable()->associate($kanji)->save();
                }
            }
            return ['data' => $kanji];

        }catch(Exception $e){
            return $this->sendError('Error.', ['error'=>$e->getMessage()], 400);
        }
    }

    // make question
    private function makeQuest($number, $user, $level){
        $kanjis_learned = Learned::where('learnable_type', 'App\Models\Kanji')->where('user_id', $user->id)->get();
        $vocabularies_learned = Learned::where('learnable_type', 'App\Models\Vocabulary')->where('user_id', $user->id)->get();
        $vocabularies = Vocabulary::where('Level','>=',$level)->get();
        $kanjis = Kanji::with('pronounces')->where('Level','>=',$level)->get();
        if(!$kanjis_learned->isEmpty()){
            foreach($kanjis_learned as $learned){
                $tmp = Kanji::where('id', $learned->learnable_id)->get();
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

    //Quiz Request
    
    public function Quiz(){
        try{
            $current = Auth::user();
            return $this->makeQuest(1, $current, $current->level);

        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    //point caculate
    private function PointCalc($user, $result, $question, $type){
        if($type == 'kanji'){
            $leanred = Kanji::where('character', $question->character)->first();
            if(Learned::where('user_id', $user->id)->where('seen',true)->where('remember',true)
                ->where('learnable_id',$leanred->id)->where('learnable_type','App\Models\Kanji')->first()){
                return;
            }
        }
        else{
            $leanred = Vocabulary::where('word', $question->word)->first();
            if(Learned::where('user_id', $user->id)->where('seen',true)->where('remember',true)
                ->where('learnable_id',$leanred->id)->where('learnable_type','App\Models\Vocabulary')->first()){
                return;
            }
        }
        $Qa = pow(10,$user->point/4000);
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
    }
    //response Quiz Answer
    
    public function QuizAnswer(Request $request){
        try{
            $current = Auth::user();
            $result = false;
            if($request->type == 'kanji'){
                $question = Kanji::with('pronounces')->where('character', $request->question)->first();
                for($i=0; $i < count($question->pronounces); $i++){
                    if(($question->pronounces[$i]->Katakana == $request->answer)||($question->pronounces[$i]->Hiragana == $request->answer)){
                        $result = true;
                        break;
                    }
                }
            }
            else{
                $question = Vocabulary::where('word', $request->question)->first();
                if($question->pronounce == $request->answer){
                    $result = true;
                }
            }
            $this->PointCalc($current, $result, $question, $request->type);
            return $this->sendResponse($result,($result?'Correct!':'Wrong'));
        }catch(Exception $e){
            return $this->sendError('Error!', ['error'=>$e], 400);
        }
    }

    public function createNewKanji(Request $request){
        try{
            Validator::make($request->all(),[
                'character' => 'required|max:1|unique',
                'group' => 'required',
                'mean' => 'required|min:1',
                'level' => 'required',
                'pronounce' => 'require'
            ]);
            $current = Auth::user();
            if(Kanji::where('character', $request->character)->first()){
                return response()->json(['message' => 'Already add this Kanji'], 400);
            }
            if($current->role == USER::ROLE_ADMIN){
                $kanji = Kanji::insertGetId([
                    'character' => $request->character,
                    'group' => $request->group,
                    'meaning' => $request->mean,
                    'level' => $request->level,
                ]);
                for($i = 0; $i<sizeof($request->type)-1;$i++){
                    if($request->type[$i] == 'Onyomi'){
                        Pronounce::insert(['Type'=>'Onyomi','Romanji'=>$request->romanji[$i],'Hiragana'=>'','Katakana'=>$request->japanese[$i],'kanji_id'=>$kanji]);
                    }
                    if($request->type[$i] == 'Kunyomi'){
                        Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>$request->romanji[$i],'Hiragana'=>$request->japanese[$i],'Katakana'=>'','kanji_id'=>$kanji]);
                    }
                }
                return response()->json(['message' => 'Success'], 200);
            }
            else{
                return response()->json(['message' => 'Permission denied'], 403);
            }
        }
        catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function editKanji(Request $request){
        try{
            Validator::make($request->all(),[
                'character' => 'required|max:1',
                'group' => 'required',
                'mean' => 'required|min:1',
                'level' => 'required',
                'pronounce' => 'require'
            ]);
            $user = Auth::user();
            if($user->role == USER::ROLE_ADMIN){
                $kanji = Kanji::find($request->id);
                $kanji->upadte([
                    'character' => $request->character,
                    'group' => $request->group,
                    'mean' => $request->mean,
                    'level' => $request->level,
                ]);
                foreach($request->pronounce as $pronounce){
                    if($pronounce->Type = 'Onyomi'){
                        Pronounce::insert(['Type'=>'Onyomi','Romanji'=>$pronounce[1],'Hiragana'=>'','Katakana'=>$pronounce[2],'kanji_id'=>$kanji->$id]);
                    }
                    if($pronounce->Type = 'Kunyomi'){
                        Pronounce::insert(['Type'=>'Kunyomi','Romanji'=>$pronounce[1],'Hiragana'=>'','Katakana'=>$pronounce[2],'kanji_id'=>$kanji->$id]);
                    }
                }
                $kanji->save();
                return $kanji;
            }
            else{
                return response()->json(['message' => 'Permission denied'], 403);
            }
        }
        catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
