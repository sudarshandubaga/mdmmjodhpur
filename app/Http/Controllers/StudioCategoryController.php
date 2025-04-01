<?php

namespace App\Http\Controllers;

use App\Models\StudioCategory;
use Illuminate\Http\Request;

class StudioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studioCategories = StudioCategory::latest()->get();
        return view('admin.screens.studio-category.index', compact('studioCategories'));
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
            'name' => 'required|unique:studio_categories,name',
        ]);

        $studioCategory = new StudioCategory();
        $studioCategory->name = $request->name;
        $studioCategory->save();

        return redirect()->back()->with('success', 'Success! Studio Category added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudioCategory $studioCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudioCategory $studioCategory)
    {
        request()->replace($studioCategory->toArray());
        request()->flash();

        return view('admin.screens.studio-category.edit', compact('studioCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudioCategory $studioCategory)
    {
        $request->validate([
            'name' => 'required|unique:studio_categories,name,' . $studioCategory->id,
        ]);

        $studioCategory->name = $request->name;
        $studioCategory->save();

        return redirect(route('admin.studio-category.index'))->with('success', 'Success! StudioCategory image added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudioCategory $studioCategory)
    {
        $studioCategory->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
