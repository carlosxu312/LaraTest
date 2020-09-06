<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function store($questionId)
    {
        $question = Question::published()->findOrFail($questionId);

        $this->validate(request(), [
            'content' => 'required'
        ]);

        $question->answers()->create([
            'user_id' => auth()->id(),
            'content' => request('content')
        ]);

        return response()->json([],201);

    }
}
