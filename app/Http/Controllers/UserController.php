<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{    
    public function index()
    {
        return UserResource::collection(User::all());
    }
   
    public function store(Request $request)
    {
        return $user = User::create($request->all());
    }
   
    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, User $user)
    {
        $user = $user->update($request->all());
        return $user;
    }

    public function destroy(User $user)
    {
        return $user->delete();
    }

    public function showWithQuiz(User $user)
    {
        return UserResource::make($user->load('quizzes.questions.options'));
    }
}
