<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Kanji;
use App\Models\Learned;
use App\Models\missPronounces;
use App\Models\MeaningVietnamese;
use App\Models\ExampleVietnamese;
use App\Models\Vocabulary;
use App\Models\User;
use Validator;


class VocabularyController extends BaseController
{
    //get Vocabulary Detail
    
    public function getDetail(Request $request)
    {
        $result = Vocabulary::with('meaningVietnamese')->with('kanjis')->find($request->vocabulary_id);
        if($request->user_id)
        {
            if(!(Learned::where('learnable_type','App\Models\Vocabulary')->where('learnable_id',$result->id)->where('user_id',$request->user_id)->exists()))
            {
                $word_learned = new Learned;
                $word_learned->user_id = $request->user_id;
                $word_learned->seen = true;
                $word_learned->remember = false;    
                $word_learned->point = 0;
                $word_learned->learned_date = \Carbon\Carbon::now();
                $word_learned->learnable()->associate($result)->save();
            }
        }
        $result->meaningVietnamese->load('exampleVietnamese');
        try
        {
            return ['data' => $result];

        }
        catch(Exception $e)
        {
            return $this->sendError('Error.', ['error'=>$e->getMessage()], 400);
        }
    }

    //Regrex
    const KataHira = '/[\x{3041}-\x{3096}\x{30A0}-\x{30FF}]/u';
    const Kanji = '/[\x{3400}-\x{4DB5}\x{4E00}-\x{9FCB}\x{F900}-\x{FA6A}\x{2E80}-\x{2FD5}\x{FF5F}-\x{FF9F}\x{3000}-\x{303F}\x{31F0}-\x{31FF}\x{3220}-\x{3243}\x{3280}-\x{337F}]/u';
    // Search component
    public function search(Request $request)
    {
        // Pronounce search
        if(preg_match(VocabularyController::KataHira, $request->key)){
            $kanji = Kanji::with('pronounces')->whereHas('pronounces', function($query) use($request)
            {
                $query->where('pronounces.Hiragana','LIKE', "%$request->key%")->orWhere('pronounces.Katakana','LIKE', "%$request->key%");
            })->take(5)->get();
            $vocabulary = Vocabulary::with('meaningVietnamese')->where('pronounce','LIKE', "%$request->key%")->take(5)->get();

        }
        //character search
        elseif(preg_match(VocabularyController::Kanji, $request->key)){
            $vocabulary = Vocabulary::with('meaningVietnamese')->where('word','LIKE', "%$request->key%")->take(5)->get();
            $kanji = Kanji::with('pronounces')->where('character','LIKE', "%$request->key%")->take(5)->get();
        }
        //meaning and alphabet search
        else{
            $vocabulary = Vocabulary::with('meaningVietnamese')->whereHas('meaningVietnamese', function($query) use($request)
            {
                $query->where('meaning','LIKE', "%$request->key%");
            })->take(5)->get();
            $kanji = Kanji::with('pronounces')->whereHas('pronounces', function($query) use($request)
            {
                $query->where('Romanji','LIKE', "%$request->key%");
            })->orWhere('meaning','LIKE', "%$request->key%")->orWhere('group','LIKE', "%$request->key%")->take(5)->get();
        }
        $result = new Collection;
        $result = $result->merge($kanji);
        $result = $result->merge($vocabulary);
        return $result;
    }

    public function createNewVocabulary(Request $request){
        try{
            Validator::make($request->all(),[
                'word' => 'required|max:5',
                'pronounce' => 'required|max:1024',
                'meaning' => 'required',
                'examplej' => 'require',
                'examplev' => 'require',
                'level' => 'required'
            ]);
            $user = Auth::user();
            if($user->role == USER::ROLE_ADMIN){
                $vocabulary = Vocabulary::insertGetId([
                    'word' => $request->word,
                    'pronounce' =>$request->pronounce,
                    'level' => $request->level
                ]);
                for($i = 0; $i<sizeof($request->meaning)-1;$i++){
                    $mean = MeaningVietnamese::insertGetId(['meaning' => $request->meaning[$i],'vocabulary_id' => $vocabulary]);
                    ExampleVietnamese::insert(['japanese_example' => $request->examplej[$i], 
                                            'vietnamese_example' => $request->examplev[$i],'meaning_vietnamese_id' => $mean]);
                }
                $chars = str_split($request->word);
                foreach($chars as $kanji){
                    if($kanji = Kanji::where('character', $request->kanji)->first())
                    {
                        $kanji->vocabularies()->attach($vocabulary);
                    }
                }
                foreach($request->miss as $miss){
                    $sample = missPronounces::insert(['pronounce' => $miss ,'vocabulary_id' => $vocabulary]);
                }
            }
            else{
                return response()->json(['message' => 'Permission denied'], 403);
            }
        }
        catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function editVocabulary(Request $request){
        try{
            Validator::make($request->all(),[
                'character' => 'required|max:1',
                'mean' => 'required|min:1',
                'meaning' => 'required',
                'example' => 'require',
                'level' => 'required'
            ]);
            $user = Auth::user();
            if($user->role == USER::ROLE_ADMIN){
                $vocabulary = Vocabulary::find($id);
                $vocabulary->update([
                    'word' => $request->word,
                    'pronounce' =>$request->pronounce,
                    'level' => $request->level
                ]);
                foreach($request->meaning as $meaning){
                    $mean = MeaningVietnamese::insertGetId(['meaning' => $meaning[0],'vocabulary_id' => $vocabulary]);
                    ExampleVietnamese::insert(['japanese_example' => $meaning[1], 
                                            'vietnamese_example' => $meaning[2],'meaning_vietnamese_id' => $mean]);
                }
                foreach($request->kanji as $kanji){
                    $kanji = Kanji::where('character', $request->kanji)->first();
                    $kanji->vocabularies()->attach($vocabulary);
                }
                foreach($request->miss as $miss){
                    $sample = missPronounces::insert(['pronounce' => $miss ,'vocabulary_id' => $vocabulary]);
                }
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
