<?php

namespace App\Http\Controllers;

use App\Models\{Training, User};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $coaches = User::where('role', 'coach')->get();
        $trainings = Training::all();

        return view('home', compact('coaches', 'trainings'));
    }
}
