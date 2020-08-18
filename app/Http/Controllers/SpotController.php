<?php

namespace App\Http\Controllers;

use App\Spot;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SpotRequest;

class SpotController extends Controller
{
    /**
     * @param Spot $spot
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Spot $spot)
    {
        $user = Auth::user();

        return view('spot/show', [
            'spot' => $spot, 
            'user' => $user,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('spot.create');
    }

    /**
     * @param SpotRequest $request
     * @param Spot $spot
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SpotRequest $request, Spot $spot)
    {
        $userId = Auth::id();
        $spot->user_id = $userId;
        $spot->fill($request->all())->save();

        return redirect()->route('diary.create');
    }

    /**
     * @param Spot $spot
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Spot $spot)
    {
        return view('spot/edit', [
            'spot' => $spot,
        ]);
    }

    /**
     * @param SpotRequest $request
     * @param Spot $spot
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SpotRequest $request, Spot $spot)
    {
        $spot->fill($request->all())->save();

        return redirect()->route('spot.show', [
            'spot' => $spot,
        ]);
    }
}
