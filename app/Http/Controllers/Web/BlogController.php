<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('web.screens.blog', ['page' => $blog]);
    }
}
