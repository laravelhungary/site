<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{
	/**
	 * A konstruktorban mindenképpen ellőrizni kell, hogy a kérdés beküldéséhez
	 * be van-e jelentkezve a felhasználó, mivel bejelentkezés nélkül nem lehet 
	 * kérdést feltenni.
	 */
    public function __construct() {
    	$this->middleware('auth');
    }

    /**
     * A kitöltött űrlap erre a függvényre fog érkezni. Ellenőrzi a bevitt adatok 
     * helyességét és, ha minden megfelelt, akkor létrehozza a kérdést az adatbázisban,
     * természetesen hozzákötve a bejelentkezett felhasználóhoz.
     * @param  Request $request [description]
     * @return Response         [description]
     */
    public function store(Request $request) {
    	$this->validate($request, [
    		'title' => 'required|max:150',
    		'content' => 'required',
		]);

		$request->user()->questions()->create([
			'title' => $request->title,
			'slug' => $request->title,
			'content' => $request->content,
		]);

		return back()->with('success', 'Sikeresen közzé lett téve a kérdésed. Köszönjük az aktivitásod.');
    }

}
