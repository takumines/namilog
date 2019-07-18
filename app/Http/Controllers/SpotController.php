<?php

namespace App\Http\Controllers;

use App\Spot;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSpot;
use App\Http\Requests\EditSpot;

class SpotController extends Controller
{
    public function show(int $id)
    {
        $spot = Spot::find($id);

        return view('spot/show', [
            'spot' => $spot, 
            ]);
    }

    public function add()
    {
        return view('spot/create');
    }

    public function create(CreateSpot $request)
    {
        $spot = new Spot();
        $spot->name = $request->name;
        $spot->place = $request->place;
        $spot->body = $request->body;
        /* user_id実装 */
        $spot->save();

        return redirect()->route('spot.show', [
            'id' => $spot->id,
        ]);
    }

    public function edit(int $id, Spot $spot)
    {
        $spot = Spot::find($id);

        return view('spot/edit', [
            'spot' => $spot,
        ]);
    }

    public function update(EditSpot $request)
    {
        $spot = Spot::find($request->id);

        $spot->name = $request->name;
        $spot->place = $request->place;
        $spot->body = $request->body;

        $spot->save();

        return redirect()->route('spot.show', [
            'id' => $spot->id,
        ]);
    }
}
