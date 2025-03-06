<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Storage;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pages = Page::query()
        ->when($request->search , fn($query , $search) => $query->where('title' , 'like' , "%$search%")->orWhere('content' , 'like' , "%$search%"))
        ->when($request->status , fn($query , $status) => $query->where('status' , $status))
        ->when($request->order , fn($query , $order) => $query->orderBy('title' , $order))
        ->paginate(10);

        return view('dashboard.pages.index' , compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        Page::create(
            [
                'title' => $request->title,
                'content' => $request->content,
                'is_active' => $request->is_active,
                'cover' => $this->UploadFile($request->cover , 'pages')
            ]
        );

        return redirect()->route('dashboard.pages.index')->with('success' , 'تمت الإضافة بنجاح');
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
        $page = Page::findOrFail($id);

        return view('dashboard.pages.edit' , compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $page = Page::findOrFail($id);

        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'is_active'   => 'required|boolean',
            'cover'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $page->title = $validatedData['title'];
        $page->content = $validatedData['content'];
        $page->is_active = $validatedData['is_active'];

        if ($request->hasFile('cover')) {
            if ($page->image && file_exists(public_path($page->cover))) {
                Storage::disk('public')->delete($page->cover);
            }

            $page->cover = $this->uploadFile($request->cover, 'pages');
        }

        $page->save();

        return redirect()->route('dashboard.pages.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('dashboard.pages.index')->with('success' , 'تم الحذف بنجاح');
    }
}
