<?php

namespace App\Http\Controllers\User;

use App\Models\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $question = Question::findOrFail($request->commentable_id);
        $question->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->user()->id,
        ]);
        return back()->with('success', 'Sikeresen beküldte a válaszát. Mindannyian köszönjük!');
    }
}
