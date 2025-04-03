<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Page;
use App\Models\StudioCategory;
use App\Models\Syndication;
use App\Models\Team;
use App\Models\Vfx;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Page $page)
    {
        $pageName = $page->template ?? 'page';

        switch ($pageName) {
            case 'news':
                return $this->news($page);

            case 'member':
                return $this->member($page);

            case 'contact':
                return $this->contact($page);

            case 'faq':
                return $this->faq($page);

            default:
                return $this->defaultPage($page);
        }
    }

    private function news($page)
    {
        $blogs = Blog::latest()->paginate(15);
        return view('web.screens.news', compact('page', 'blogs'));
    }

    private function member($page)
    {
        $groups = Team::pluck("team_type");
        $members = [];
        foreach ($groups as $type) {
            $members[$type] = Team::where('team_type', $type)->get();
        }
        return view('web.screens.member', compact('page', 'members'));
    }

    private function contact($page)
    {
        return view('web.screens.contact', compact('page'));
    }

    private function faq($page)
    {
        $faqs = Faq::latest()->get();
        return view('web.screens.faq', compact('page', 'faqs'));
    }

    private function defaultPage($page)
    {
        return view('web.screens.page', compact('page'));
    }
}
