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
}
