<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KanjiController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VocabularyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AuthController::class)->group(function(){
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('accepted', 'accept')->name('accept');
});
//Kanjis+Vocabularies Controller
//Auth
Route::get('v1/getMainLogedInfo',[KanjiController::class,'getMainLogedInfo'])->middleware('auth:sanctum')->name('loged.mainInfo');
Route::get('v1/quiz',[KanjiController::class,'Quiz'])->middleware('auth:sanctum')->name('getQuiz');
Route::post('v1/quiz-answer',[KanjiController::class,'QuizAnswer'])->middleware('auth:sanctum')->name('sendAnswer');
Route::post('v1/kanji/loged-detail',[KanjiController::class,'getLogedDetail'])->middleware('auth:sanctum')->name('loged.kanjiDetail');
Route::post('v1/vocabulary/loged-detail',[VocabularyController::class,'getLogedDetail'])->middleware('auth:sanctum')->name('loged.vocabularyDetail');
//Test
Route::get('test',[TestController::class,'Test'])->middleware('auth:sanctum')->name('test.get');
Route::post('test-answer',[TestController::class,'TestResult'])->middleware('auth:sanctum')->name('test.sendAnswer');
Route::get('exam/{level}',[TestController::class,'Exam'])->middleware('auth:sanctum')->name('test.get');
Route::post('exam-answer',[TestController::class,'ExamResult'])->middleware('auth:sanctum')->name('test.sendAnswer');
//UnAuth
Route::get('v1/getMainInfo',[KanjiController::class,'getMainInfo'])->name('mainInfo');
Route::post('v1/kanji/detail',[KanjiController::class,'getDetail'])->name('kanjiDetail');
Route::post('v1/vocabulary/detail',[VocabularyController::class,'getDetail'])->name('vocabularyDetail');
//search
Route::post('search',[VocabularyController::class,'search'])->name('search');
//Kanji
//Vocabulary
