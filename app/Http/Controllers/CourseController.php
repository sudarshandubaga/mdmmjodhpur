<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Course::query();
        $courses = $query->latest()->paginate(10);

        return view('admin.screens.course.index', compact('courses'));
    }

    public function create()
    {
        request()->flush();

        return view('admin.screens.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->title = $request->title;
        $course->slug = Str::slug($request->title, '-');
        $course->description = $request->description;
        $course->seo_title = $request->seo_title;
        $course->seo_keywords = $request->seo_keywords;
        $course->seo_description = $request->seo_description;

        if (!empty($request->image)) {
            $course->image = dataUriToImage($request->image, "courses");
        }

        $course->save();

        $course->slug .= "-" . base64_encode($course->id);
        $course->save();

        return redirect(route('admin.course.index'))->with('success', 'Success! New course has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        request()->replace($course->toArray());
        request()->flash();

        return view('admin.screens.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course->title = $request->title;
        $course->slug = Str::slug($request->title, '-');
        $course->description = $request->description;
        $course->seo_title = $request->seo_title;
        $course->seo_keywords = $request->seo_keywords;
        $course->seo_description = $request->seo_description;

        if (!empty($request->image)) {
            if (!empty($course->image)) {
                unlink(public_path() . "/storage/" . $course->getRawOriginal('image'));
            }
            $course->image = dataUriToImage($request->image, "courses");
        }

        $course->save();

        $course->slug .= "-" . base64_encode($course->id);
        $course->save();

        return redirect(route('admin.course.index'))->with('success', 'Success! New course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if (!empty($course->image)) {
            unlink(public_path() . "/storage/" . $course->getRawOriginal('image'));
        }
        $course->delete();

        return redirect()->back()->with("success", "Success! Course has been deleted.");
    }
}
