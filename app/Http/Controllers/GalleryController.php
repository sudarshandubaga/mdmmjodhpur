<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.screens.gallery.index', compact('galleries'));
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
            'image' => 'required'
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->title;
        if (!empty($request->image)) {
            $gallery->image = dataUriToImage($request->image, "galleries");
        }
        $gallery->save();

        return redirect()->back()->with('success', 'Success! Gallery image added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        request()->replace($gallery->toArray());
        request()->flash();

        return view('admin.screens.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $gallery->title = $request->title;
        if (!empty($request->image)) {
            if ($gallery->image) {
                unlink(public_path() . "/storage/" . $gallery->getRawOriginal('image'));
            }
            $gallery->image = dataUriToImage($request->image, "galleries");
        }
        $gallery->save();

        return redirect(route('admin.gallery.index'))->with('success', 'Success! Gallery image added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            unlink(public_path() . "/storage/" . $gallery->getRawOriginal('image'));
        }
        $gallery->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
