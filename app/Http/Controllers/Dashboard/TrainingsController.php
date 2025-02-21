<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreTrainingRequest;
use Illuminate\Http\Request;
use App\Models\Training;

class TrainingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::paginate(10);

        return view('dashboard.trainings.index' , [
            'trainings' => $trainings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingRequest $request)
    {
        Training::create(
            [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $this->UploadFile($request->image , 'trainings')
            ]
        );

        return redirect()->route('dashboard.trainings.index')->with('success' , 'تمت الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $training = Training::findOrFail($id);

        return view('dashboard.trainings.edit' , [
            'training' => $training
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $training = Training::findOrFail($id);

        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $training->title = $validatedData['title'];
        $training->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            if ($training->image && file_exists(public_path($training->image))) {
                unlink(public_path($training->image));
            }

            $imagePath = $request->file('image')->store('trainings', 'public');
            $training->image = 'storage/' . $imagePath;
        }

        $training->save();

        return redirect()->route('dashboard.trainings.index')->with('success', 'تم تحديث التمرين بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $training = Training::findOrFail($id);
        $training->delete();

        return redirect()->route('dashboard.trainings.index')->with('success' , 'تم الحذف بنجاح');
    }
}
