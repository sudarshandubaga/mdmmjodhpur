<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Infrastructure::query();
        $infrastructures = $query->latest()->paginate(10);

        return view('admin.screens.infrastructure.index', compact('infrastructures'));
    }

    public function create()
    {
        request()->flush();

        return view('admin.screens.infrastructure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $infrastructure = new Infrastructure();
        $infrastructure->title = $request->title;
        $infrastructure->slug = Str::slug($request->title, '-');
        $infrastructure->description = $request->description;
        $infrastructure->seo_title = $request->seo_title;
        $infrastructure->seo_keywords = $request->seo_keywords;
        $infrastructure->seo_description = $request->seo_description;

        if (!empty($request->image)) {
            $infrastructure->image = dataUriToImage($request->image, "infrastructures");
        }

        if (!empty($request->banner_image)) {
            $infrastructure->banner_image = dataUriToImage($request->banner_image, "infrastructures");
        }

        $infrastructure->save();

        $infrastructure->slug .= "-" . base64_encode($infrastructure->id);
        $infrastructure->save();

        return redirect(route('admin.infrastructure.index'))->with('success', 'Success! New infrastructure has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Infrastructure $infrastructure)
    {
        //
    }

    public function edit(Infrastructure $infrastructure)
    {
        request()->replace($infrastructure->toArray());
        request()->flash();

        return view('admin.screens.infrastructure.edit', compact('infrastructure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Infrastructure $infrastructure)
    {
        $infrastructure->title = $request->title;
        $infrastructure->slug = Str::slug($request->title, '-');
        $infrastructure->description = $request->description;
        $infrastructure->seo_title = $request->seo_title;
        $infrastructure->seo_keywords = $request->seo_keywords;
        $infrastructure->seo_description = $request->seo_description;

        if (!empty($request->image)) {
            if (!empty($infrastructure->image)) {
                unlink(public_path() . "/storage/" . $infrastructure->getRawOriginal('image'));
            }
            $infrastructure->image = dataUriToImage($request->image, "infrastructures");
        }

        if (!empty($request->banner_image)) {
            if (!empty($infrastructure->banner_image)) {
                unlink(public_path() . "/storage/" . $infrastructure->getRawOriginal('banner_image'));
            }
            $infrastructure->banner_image = dataUriToImage($request->banner_image, "infrastructures");
        }

        $infrastructure->save();

        $infrastructure->slug .= "-" . base64_encode($infrastructure->id);
        $infrastructure->save();

        return redirect(route('admin.infrastructure.index'))->with('success', 'Success! New infrastructure has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Infrastructure $infrastructure)
    {
        if (!empty($infrastructure->image)) {
            unlink(public_path() . "/storage/" . $infrastructure->getRawOriginal('image'));
        }

        if (!empty($infrastructure->banner_image)) {
            unlink(public_path() . "/storage/" . $infrastructure->getRawOriginal('banner_image'));
        }

        $infrastructure->delete();

        return redirect()->back()->with("success", "Success! Infrastructure has been deleted.");
    }
}
