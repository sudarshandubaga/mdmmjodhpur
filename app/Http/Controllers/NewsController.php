<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newss = News::latest()->get();
        return view('admin.screens.news.index', compact('newss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf,doc,docx'
        ]);

        $news = new News();
        $news->title = $request->title;
        if ($request->hasFile('file')) {
            $news->file = $request->file->store('newss', 'public');
        }
        $news->save();

        return redirect()->back()->with('success', 'Success! News added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        request()->replace($news->toArray());
        request()->flash();

        return view('admin.screens.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx'
        ]);

        $news->title = $request->title;
        if ($request->hasFile('file')) {
            if ($news->file) {
                unlink(public_path() . "/storage/" . $news->getRawOriginal('file'));
            }
            $news->file = $request->file->store('newss', 'public');
        }
        $news->save();

        return redirect(route('admin.news.index'))->with('success', 'Success! News added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if ($news->file) {
            unlink(public_path() . "/storage/" . $news->getRawOriginal('file'));
        }
        $news->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
