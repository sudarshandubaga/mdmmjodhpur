<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Academic::query();
        $academics = $query->latest()->paginate(10);

        return view('admin.screens.academic.index', compact('academics'));
    }

    public function create()
    {
        request()->flush();

        $courses = Course::orderBy('title')->pluck('title', 'id');

        return view('admin.screens.academic.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $academic = new Academic();
        $academic->title = $request->title;
        $academic->slug = Str::slug($request->title, '-');
        $academic->course_id = $request->course_id;
        $academic->description = $request->description;
        $academic->seo_title = $request->seo_title;
        $academic->seo_keywords = $request->seo_keywords;
        $academic->seo_description = $request->seo_description;

        if (!empty($request->image)) {
            $academic->image = dataUriToImage($request->image, "academics");
        }

        $academic->save();

        $academic->slug .= "-" . base64_encode($academic->id);
        $academic->save();

        return redirect(route('admin.academic.index'))->with('success', 'Success! New academic has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Academic $academic)
    {
        //
    }

    public function edit(Academic $academic)
    {
        request()->replace($academic->toArray());
        request()->flash();

        $courses = Course::orderBy('title')->pluck('title', 'id');

        return view('admin.screens.academic.edit', compact('academic', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academic $academic)
    {
        $academic->title = $request->title;
        $academic->slug = Str::slug($request->title, '-');
        $academic->course_id = $request->course_id;
        $academic->description = $request->description;
        $academic->seo_title = $request->seo_title;
        $academic->seo_keywords = $request->seo_keywords;
        $academic->seo_description = $request->seo_description;

        if (!empty($request->image)) {
            if (!empty($academic->image)) {
                unlink(public_path() . "/storage/" . $academic->getRawOriginal('image'));
            }
            $academic->image = dataUriToImage($request->image, "academics");
        }

        $academic->save();

        $academic->slug .= "-" . base64_encode($academic->id);
        $academic->save();

        return redirect(route('admin.academic.index'))->with('success', 'Success! New academic has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academic $academic)
    {
        if (!empty($academic->image)) {
            unlink(public_path() . "/storage/" . $academic->getRawOriginal('image'));
        }
        $academic->delete();

        return redirect()->back()->with("success", "Success! Academic has been deleted.");
    }
}
