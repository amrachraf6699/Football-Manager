<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::paginate(10);

        return view('dashboard.positions.index' , compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request)
    {
        Position::create($request->validated());

        return redirect()->route('dashboard.positions.index')->with('success' , 'تمت الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $position = Position::findOrFail($id);

        return view('dashboard.positions.edit' , compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $position = Position::findOrFail($id);

        $validatedData = $request->validate([
            'name'        => 'required|string|max:255|unique:positions,name,' . $position->id,
            'description' => 'nullable|string',
            'code'        => 'required|string|max:10|unique:positions,code,' . $position->id,
        ]);

        $position->update($validatedData);

        return redirect()->route('dashboard.positions.index')->with('success' , 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('dashboard.positions.index')->with('success' , 'تم الحذف بنجاح');
    }
}
