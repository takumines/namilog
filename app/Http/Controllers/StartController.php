<?php

namespace App\Http\Controllers;

use App\Spot;
use App\Http\Requests\SpotRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StartController extends Controller
{
    public function index()
    {
        return view('start/start');
    }

    public function add()
    {
        return view('start/create');
    }

    public function create(SpotRequest $request)
    {
        $spot = new Spot();
        $form = $request->all();
        
        $spot->fill($form)->save();

        return redirect()->route('diary.index');
    }
}
