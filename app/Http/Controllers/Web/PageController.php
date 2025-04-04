<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Document;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Infrastructure;
use App\Models\News;
use App\Models\Page;
use App\Models\Team;
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

            case 'publication':
                return $this->publication($page);

            case 'infrastructure':
                return $this->infrastructure($page);

            case 'document':
                return $this->documents($page);

            case 'academics':
                return $this->academic($page);

            case 'gallery':
                return $this->gallery($page);

            default:
                return $this->defaultPage($page);
        }
    }

    private function news($page)
    {
        $newss = News::latest()->paginate(15);
        return view('web.screens.news', compact('page', 'newss'));
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

    private function publication($page)
    {
        $publications = Blog::latest()->paginate(15);
        return view('web.screens.publication', compact('page', 'publications'));
    }

    private function infrastructure($page)
    {
        $infrastructures = Infrastructure::latest()->paginate(15);
        return view('web.screens.infrastructure', compact('page', 'infrastructures'));
    }

    private function documents($page)
    {
        $documents = Document::latest()->paginate(100);
        return view('web.screens.document', compact('page', 'documents'));
    }

    private function academic($page)
    {
        $courses = Course::latest()->paginate(15);
        return view('web.screens.courses', compact('page', 'courses'));
    }

    private function gallery($page)
    {
        $galleries = Gallery::latest()->paginate(15);
        return view('web.screens.gallery', compact('page', 'galleries'));
    }

    private function defaultPage($page)
    {
        return view('web.screens.page', compact('page'));
    }
}
