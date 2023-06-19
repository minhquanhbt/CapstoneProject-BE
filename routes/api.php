<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KanjiController;

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
Route::get('v1/getMainLogedInfo',[KanjiController::class,'getMainLogedInfo'])->middleware('auth:sanctum')->name('loged.mainInfo');
Route::get('v1/getMainInfo',[KanjiController::class,'getMainInfo'])->name('mainInfo');
Route::get('v1/quiz',[KanjiController::class,'Quiz'])->middleware('auth:sanctum')->name('getQuiz');
Route::post('v1/quiz-answer',[KanjiController::class,'QuizAnswer'])->middleware('auth:sanctum')->name('sendAnswer');
