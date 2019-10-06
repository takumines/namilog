<?php

namespace App\Http\Controllers;

use App\Spot;
use App\Http\Requests\SpotRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StartController extends Controller
{
    public function home()
    {
        return view('start/home');
    }

    public function add()
    {
        return view('start/create');
    }

    public function create(SpotRequest $request)
    {
        $users = User::all();
        $diaries = Diary::all();
        $spot = new Spot();
        $user = Auth::user();
        $spot->user_id = $user->id;
        $form = $request->all();
        
        $spot->fill($form)->save();

        return redirect()->route('diary.list', [
            'diaries' => $diaries,
            'users' => $users,
        ]);
    }
}
