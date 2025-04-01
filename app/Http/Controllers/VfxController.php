<?php

namespace App\Http\Controllers;

use App\Models\Vfx;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VfxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Vfx::query();
        $vfxs = $query->latest()->paginate(10);

        return view('admin.screens.vfx.index', compact('vfxs'));
    }

    public function create()
    {
        request()->flush();

        return view('admin.screens.vfx.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vfx = new Vfx();
        $vfx->title = $request->title;

        if (!empty($request->before_image)) {
            $vfx->before_image = dataUriToImage($request->before_image, "vfxs");
        }

        if (!empty($request->after_image)) {
            $vfx->after_image = dataUriToImage($request->after_image, "vfxs");
        }

        $vfx->save();

        return redirect(route('admin.vfx.index'))->with('success', 'Success! New vfx has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vfx $vfx)
    {
        //
    }

    public function edit(Vfx $vfx)
    {
        request()->replace($vfx->toArray());
        request()->flash();

        return view('admin.screens.vfx.edit', compact('vfx'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vfx $vfx)
    {
        $vfx->title = $request->title;

        if (!empty($request->before_image)) {
            if (!empty($vfx->before_image)) {
                unlink(public_path() . "/storage/" . $vfx->getRawOriginal('before_image'));
            }
            $vfx->before_image = dataUriToImage($request->before_image, "vfxs");
        }

        if (!empty($request->after_image)) {
            if (!empty($vfx->after_image)) {
                unlink(public_path() . "/storage/" . $vfx->getRawOriginal('after_image'));
            }
            $vfx->after_image = dataUriToImage($request->after_image, "vfxs");
        }

        $vfx->save();

        return redirect(route('admin.vfx.index'))->with('success', 'Success! New vfx has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vfx $vfx)
    {
        if (!empty($vfx->before_image)) {
            unlink(public_path() . "/storage/" . $vfx->getRawOriginal('before_image'));
        }
        if (!empty($vfx->after_image)) {
            unlink(public_path() . "/storage/" . $vfx->getRawOriginal('after_image'));
        }
        $vfx->delete();

        return redirect()->back()->with("success", "Success! Vfx has been deleted.");
    }
}
