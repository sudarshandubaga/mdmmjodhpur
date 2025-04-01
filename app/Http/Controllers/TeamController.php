<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Team::query();
        $teams = $query->latest()->paginate(10);

        return view('admin.screens.team.index', compact('teams'));
    }

    public function create()
    {
        request()->flush();

        return view('admin.screens.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->position = $request->position;
        $team->imdb_link = $request->imdb_link;
        $team->description = $request->description;

        if (!empty($request->image)) {
            $team->image = dataUriToImage($request->image, "teams");
        }

        $team->save();

        return redirect(route('admin.team.index'))->with('success', 'Success! New team has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    public function edit(Team $team)
    {
        request()->replace($team->toArray());
        request()->flash();

        return view('admin.screens.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $team->name = $request->name;
        $team->position = $request->position;
        $team->imdb_link = $request->imdb_link;
        $team->description = $request->description;

        if (!empty($request->image)) {
            if (!empty($team->image)) {
                unlink(public_path() . "/storage/" . $team->getRawOriginal('image'));
            }
            $team->image = dataUriToImage($request->image, "teams");
        }

        $team->save();

        return redirect(route('admin.team.index'))->with('success', 'Success! New team has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        if (!empty($team->image)) {
            unlink(public_path() . "/storage/" . $team->getRawOriginal('image'));
        }
        $team->delete();

        return redirect()->back()->with("success", "Success! Team has been deleted.");
    }
}
