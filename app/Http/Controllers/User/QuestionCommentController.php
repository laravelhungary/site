<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
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
        return back()->with('success', 'Sikeresen beküldted a válaszod. Mindannyian köszönjük!');
    }

    public function like(Request $request) {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        Comment::findOrFail($request->comment)->doLike();
        return response()->json(['message' => 'Sikeres művelet történt.']);
    }
}
