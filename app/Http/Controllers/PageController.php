<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Page $page)
    {
        $page->increment('views');
        return view('page', compact('page'));
    }
}
