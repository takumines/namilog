<?php

namespace App\Http\Controllers;

use App\Spot;
use App\Diary;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\SpotRequest;


class SpotController extends Controller
{
    public function show(int $id)
    {
        $spot = Spot::find($id);
        $user = Auth::user();

        return view('spot/show', [
            'spot' => $spot, 
            'user' => $user,
            ]);
    }

    public function add()
    {
        return view('spot/create');
    }

    public function create(SpotRequest $request)
    {
        $spot = new Spot();
        $user = Auth::user();
        $spot->user_id = $user->id;
        $form = $request->all();
        
        $spot->fill($form)->save();

        return redirect()->route('diary.create');
    }

    public function edit(int $id, Spot $spot)
    {
        $spot = Spot::find($id);

        return view('spot/edit', [
            'spot' => $spot,
        ]);
    }

    public function update(SpotRequest $request)
    {
        $spot = Spot::find($request->id);
        $form = $request->all();
        $spot->fill($form)->save();

        return redirect()->route('spot.show', [
            'id' => $spot->id,
        ]);
    }
}
