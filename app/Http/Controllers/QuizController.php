<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return QuizResource::collection(Quiz::where('user_id', 1)->get());
    }

    public function store(Request $request)
    {
        $quiz = Quiz::create($request->all());
        return $quiz;
    }

    public function show(Quiz $quiz)
    {
        return QuizResource::make($quiz->load('questions'));
    }

    public function edit(Quiz $quiz)
    {
        return QuizResource::make($quiz->load('questions'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $quiz->update($request->all());
        return $quiz;
    }

    public function destroy(Quiz $quiz)
    {
        return $quiz->delete();
    }

    public function recentQuiz(Request $request)
    {
        return QuizResource::make(Quiz::where('user_id', 1)
                ->with('questions.options')
                ->orderBy('created_at', 'desc')
                ->first());
    }

    public function quizByUser(User $user)
    {
        return QuizResource::collection(Quiz::query()
                                        ->where('user_id', $user->id)
                                        ->get());
    }    
}
