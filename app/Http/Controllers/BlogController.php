<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()->latest()->paginate(12);

        return view('blogs', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $blog->is_published ? null : abort(404);

        $blog->load('creator');
        return view('blog', compact('blog'));
    }
}
