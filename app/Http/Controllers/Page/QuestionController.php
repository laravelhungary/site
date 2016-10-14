<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Megjeleníti az összes kérdést. Mivel be van állítva a paginate, így egy oldalon
     * csak 20 kérdést jelenít meg.
     * @return View
     */
    public function index() {
    	$questions = Question::latest()->paginate(20);
    	return view('public.question.index', compact('questions'));
    }

    /**
     * Megjeleníti a kiválasztott kérdést, melyhez nem kötelező bejelentkezve lenni.
     * @param  integer $public_id 10 karakter hosszú szám
     * @param  string $slug      [description]
     * @return View            [description]
     */
    public function show($public_id, $slug) {
    	$question = Question::wherePublicId($public_id)->whereSlug($slug)->firstOrFail();
        $question->incrementViews();
        $comments = $question->comments()->latest()->paginate(20);
    	return view('public.question.show', compact('question', 'comments'));
    }
}
