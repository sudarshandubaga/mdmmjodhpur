<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Models\StudioCategory;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $studios = Studio::latest()->paginate($request?->limit ?? 10);
        return view('admin.screens.studio.index', compact('studios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studioCategories = StudioCategory::oldest()->pluck('name', 'id');
        return view('admin.screens.studio.create', compact('studioCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required'
        ]);

        $studio = new Studio();
        $studio->title = $request->title;
        $studio->studio_category_id = $request->studio_category_id;
        if (!empty($request->image)) {
            $studio->image = dataUriToImage($request->image, "studios");
        }
        $studio->save();

        return redirect()->back()->with('success', 'Success! Studio image added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Studio $studio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Studio $studio)
    {
        request()->replace($studio->toArray());
        request()->flash();

        $studioCategories = StudioCategory::oldest()->pluck('name', 'id');

        return view('admin.screens.studio.edit', compact('studio', 'studioCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Studio $studio)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $studio->title = $request->title;
        $studio->studio_category_id = $request->studio_category_id;
        if (!empty($request->image)) {
            if ($studio->image) {
                unlink(public_path() . "/storage/" . $studio->getRawOriginal('image'));
            }
            $studio->image = dataUriToImage($request->image, "studios");
        }
        $studio->save();

        return redirect(route('admin.studio.index'))->with('success', 'Success! Studio image added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Studio $studio)
    {
        if ($studio->image) {
            unlink(public_path() . "/storage/" . $studio->getRawOriginal('image'));
        }
        $studio->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
