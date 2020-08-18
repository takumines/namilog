<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Spot;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DiaryRequest;
use App\Library\DiaryClass;

class DiaryController extends Controller
{
    public function list()
    {
        $diaries = Diary::orderBy('created_at','desc')->simplePaginate(6);
        $users = User::all();
        
        return view('diary/list', [
            'diaries' => $diaries,
            'users'   => $users,
            ]);
    }

    public function show(Diary $diary)
    {
        $current_user = Auth::user();
        $comments = Comment::where('diary_id', '=', $diary->id)->orderBy('created_at','desc')->simplePaginate(5);

        return view('diary/show', [
            'diary' => $diary,
            'comments' => $comments,
            'current_user' => $current_user,
        ]);
    }

    /**
     * @param Spot $spot
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Spot $spot)
    {
        $user = Auth::user();
        $spots = $spot->all();
        
        return view('diary.create', [
            'user' => $user,
            'spots' => $spots,
        ]);
    }

    /**
     * @param DiaryRequest $request
     * @param Diary $diary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DiaryRequest $request, Diary $diary)
    {
        DiaryClass::createDiary($request,$diary);

        return redirect()->route('diary.show', [
            'diary' => $diary
        ]);
    }

    public function edit(int $id, Diary $diary, Spot $spots)
    {
        $diary = Diary::find($id);
        $spots = Spot::all();
        return view('diary/edit', [
            'diary' => $diary,
            'spots'  => $spots,
        ]);
    }

    public function update(DiaryRequest $request) 
    {
        $diary = DiaryClass::updateDiary($request);
        
        return redirect()->route('diary.show', [
            'id' => $diary->id,
        ]);
    }

    public function delete(Request $request)
    {
        $diary = Diary::find($request->id);
        $comments = Comment::where('diary_id', '=', $diary->id)->delete();
        $diary->delete();
        $diareis = Diary::all();
        $users = User::all();

        return redirect()->route('diary.list', [
            'diareis' => $diareis,
            'users'   => $users,
        ]);
    }
}