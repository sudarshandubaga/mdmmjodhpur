<?php

namespace App\Http\Controllers;

use App\Models\WorkVideo;
use Illuminate\Http\Request;

class WorkVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workVideos = WorkVideo::latest()->get();
        return view('admin.screens.workVideo.index', compact('workVideos'));
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
            'title'             => 'required',
            'youtube_video_id' => 'required'
        ]);

        $workVideo = new WorkVideo();
        $workVideo->title = $request->title;
        $workVideo->youtube_video_id = $request->youtube_video_id;
        $workVideo->save();

        return redirect()->back()->with('success', 'Success! Work video added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkVideo $workVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkVideo $workVideo)
    {
        request()->replace($workVideo->toArray());
        request()->flash();

        return view('admin.screens.workVideo.edit', compact('workVideo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkVideo $workVideo)
    {
        $request->validate([
            'title'                 => 'required',
            'tityoutube_video_idle' => 'required',
        ]);

        $workVideo->title = $request->title;
        $workVideo->youtube_video_id = $request->youtube_video_id;
        $workVideo->save();

        return redirect(route('admin.workVideo.index'))->with('success', 'Success! WorkVideo image added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkVideo $workVideo)
    {
        $workVideo->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
