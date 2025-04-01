<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Movie::query();
        $movies = $query->latest()->paginate(10);

        return view('admin.screens.movie.index', compact('movies'));
    }

    public function create()
    {
        request()->flush();

        return view('admin.screens.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->name = $request->name;
        $movie->type = $request->type;
        $movie->description = $request->description;

        if (!empty($request->image)) {
            $movie->image = dataUriToImage($request->image, "movies");
        }

        $movie->save();

        return redirect(route('admin.movie.index'))->with('success', 'Success! New movie has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    public function edit(Movie $movie)
    {
        request()->replace($movie->toArray());
        request()->flash();

        return view('admin.screens.movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->name = $request->name;
        $movie->type = $request->type;
        $movie->description = $request->description;

        if (!empty($request->image)) {
            if (!empty($movie->image)) {
                unlink(public_path() . "/storage/" . $movie->getRawOriginal('image'));
            }
            $movie->image = dataUriToImage($request->image, "movies");
        }

        $movie->save();

        return redirect(route('admin.movie.index'))->with('success', 'Success! New movie has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if (!empty($movie->image)) {
            unlink(public_path() . "/storage/" . $movie->getRawOriginal('image'));
        }
        $movie->delete();

        return redirect()->back()->with("success", "Success! Movie has been deleted.");
    }
}
