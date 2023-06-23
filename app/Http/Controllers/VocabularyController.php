<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kanji;
use App\Models\Learned;
use App\Models\missPronounces;
use App\Models\Vocabulary;
use App\Models\User;


class VocabularyController extends BaseController
{
    //get Vocabulary Detail
    
    public function getDetail(Request $request){
        $result = Vocabulary::with('meaningVietnamese')->with('kanjis')->find($request->vocabulary_id);
        if($request->user_id){
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
        try{
            return ['data' => $result];

        }catch(Exception $e){
            return $this->sendError('Error.', ['error'=>$e->getMessage()], 400);
        }
    }
}
