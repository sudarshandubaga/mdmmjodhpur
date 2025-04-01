<?php

namespace App\Http\Controllers;

use App\Models\Syndication;
use Illuminate\Http\Request;

class SyndicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $syndications = Syndication::latest()->paginate($request?->limit ?? 10);
        return view('admin.screens.syndication.index', compact('syndications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.screens.syndication.create');
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

        $syndication = new Syndication();
        $syndication->title = $request->title;
        if (!empty($request->image)) {
            $syndication->image = dataUriToImage($request->image, "syndications");
        }
        $syndication->save();

        return redirect()->back()->with('success', 'Success! Syndication image added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Syndication $syndication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Syndication $syndication)
    {
        request()->replace($syndication->toArray());
        request()->flash();


        return view('admin.screens.syndication.edit', compact('syndication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Syndication $syndication)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $syndication->title = $request->title;
        if (!empty($request->image)) {
            if ($syndication->image) {
                unlink(public_path() . "/storage/" . $syndication->getRawOriginal('image'));
            }
            $syndication->image = dataUriToImage($request->image, "syndications");
        }
        $syndication->save();

        return redirect(route('admin.syndication.index'))->with('success', 'Success! Syndication image added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Syndication $syndication)
    {
        if ($syndication->image) {
            unlink(public_path() . "/storage/" . $syndication->getRawOriginal('image'));
        }
        $syndication->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
