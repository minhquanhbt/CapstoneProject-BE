<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Kanji;
use App\Models\Learned;
use App\Models\missPronounces;
use App\Models\Vocabulary;
use App\Models\User;


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
}
