<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayerRequest;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = User::query()->isPlayer()->with('player')->paginate(10);

        return view('dashboard.players.index' , compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::all();
        $parents = User::query()->parent()->get();
        return view('dashboard.players.create' , compact('positions' , 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
        $user = User::create(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'image' => $this->UploadFile($request->image , 'players'),
                'password' => bcrypt('password'),
                'parent_id' => $request->parent_id,
                'role' => 'player',
        ]);

        $player = $user->player()->create([
                'dob' => $request->dob,
                'height' => $request->height,
                'weight' => $request->weight,
        ]);

        $positions = [];
        foreach ($request->positions as $position) {
            $positions[$position['id']] = [
                'rating' => $position['rating'],
                'notes' => $position['notes'],
            ];
        }
                
        $player->positions()->attach($positions);

        return redirect()->route('dashboard.players.index')->with('success' , 'تمت الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player = User::query()->with('player')->findOrFail($id);

        return view('dashboard.players.show' , compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
