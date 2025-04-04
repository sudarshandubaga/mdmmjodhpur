<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Infrastructure;
use App\Models\News;
use App\Models\Page;
use App\Models\Slider;
use App\Models\WorkVideo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'home')->firstOrFail();

        $sliders = Slider::latest()->get();

        $blogs = Blog::latest()->paginate(10);

        $newss = News::latest()->paginate(30);

        $galleries = Gallery::latest()->paginate(30);

        $infrastructures = Infrastructure::latest()->paginate(30);

        $principalMessage = Page::where('slug', 'principal-message')->first();

        $about = Page::where('slug', 'about-us')->first();

        return view('web.screens.home', compact('blogs', 'page', 'sliders', 'newss', 'galleries', 'infrastructures', 'principalMessage', 'about'));
    }
}
