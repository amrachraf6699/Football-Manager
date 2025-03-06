<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Storage;


class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blogs = Blog::query()
        ->when($request->search , fn($query , $search) => $query->where('title' , 'like' , "%$search%")->orWhere('content' , 'like' , "%$search%"))
        ->when($request->status , fn($query , $status) => $query->where('status' , $status))
        ->when($request->order , fn($query , $order) => $query->orderBy('title' , $order))
        ->paginate(10);

        return view('dashboard.blogs.index' , compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        auth()->user()->blogs()->create(
            [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $this->UploadFile($request->image , 'blogs'),
                'is_published' => $request->is_published,
            ]
        );

        return redirect()->route('dashboard.blogs.index')->with('success' , 'تمت الإضافة بنجاح');
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
        $blog = Blog::findOrFail($id);

        return view('dashboard.blogs.edit' , compact('blog'));
    }

    // public function update(Request $request, string $id)
    // {
        
    //     $page = Page::findOrFail($id);

    //     $validatedData = $request->validate([
    //         'title'       => 'required|string|max:255',
    //         'content'     => 'required|string',
    //         'is_active'   => 'required|boolean',
    //         'cover'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
    //     ]);

    //     $page->title = $validatedData['title'];
    //     $page->content = $validatedData['content'];
    //     $page->is_active = $validatedData['is_active'];

    //     if ($request->hasFile('cover')) {
    //         if ($page->image && file_exists(public_path($page->cover))) {
    //             Storage::disk('public')->delete($page->cover);
    //         }

    //         $page->cover = $this->uploadFile($request->cover, 'pages');
    //     }

    //     $page->save();

    //     return redirect()->route('dashboard.pages.index')->with('success', 'تم التعديل بنجاح');
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'is_published'   => 'required|boolean',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];
        $blog->is_published = $validatedData['is_published'];

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path($blog->image))) {
                Storage::disk('public')->delete($blog->image);
            }

            $blog->image = $this->uploadFile($request->image, 'blogs');
        }

        $blog->save();

        return redirect()->route('dashboard.blogs.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('dashboard.blogs.index')->with('success' , 'تم الحذف بنجاح');
    }
}
