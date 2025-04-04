<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Academic;
use App\Models\Course;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = Course::findOrFail($request->course);
        $query = Academic::where('course_id', $request?->course ?? null);
        $academics = $query->latest()->paginate(100);

        return view('web.screens.academic.index', compact('academics', 'page'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Academic $academic)
    {
        return view('web.screens.academic.show', ['page' => $academic]);
    }
}
