<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Spot;
use Illuminate\Http\Request;

class Diarycontroller extends Controller
{
    public function index()
    {
        $diaries = Diary::all();
        
        return view('diary/index', [
            'diaries' => $diaries,
            ]);
    }

    public function add()
    {
        return view('diary.create');
    }

    public function create(Request $request)
    {
        $diary = new Diary();
        $diary->title = $request->title;
        $diary->score = $request->score;
        $diary->condition = $request->condition;
        $diary->size = $request->size;
        $diary->body = $request->body;

        $diary->save();
    }
}
