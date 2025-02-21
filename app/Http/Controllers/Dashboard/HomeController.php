<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\{Training, User};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $players_count = User::where('role', 'player')->count();
        $coaches_count = User::where('role', 'coach')->count();
        $parents_count = User::where('role', 'parent')->count();
        $trainings_count = Training::count();

        return view('dashboard.home', compact('players_count', 'coaches_count', 'parents_count', 'trainings_count'));
    }
}
