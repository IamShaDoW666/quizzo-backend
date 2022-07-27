<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
}); 

Route::get('/users', function(){
    return  UserResource::collection(User::all());
});

Route::delete('/user/{user}', function(User $user){
    return response('Success', 200);
});

Route::apiResource('/quiz', QuizController::class);
Route::get('/quiz-user/{user}', [QuizController::class, 'quizByUser'])->name('quiz.by-user');
Route::get('/quiz-recent', [QuizController::class, 'recentQuiz'])->name('quiz.recent');
Route::get('/user-with-quiz/{user}', [UserController::class, 'showWithQuiz'])->name('user.with-quiz');


