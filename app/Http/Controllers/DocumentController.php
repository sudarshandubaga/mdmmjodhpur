<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::latest()->get();
        return view('admin.screens.document.index', compact('documents'));
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
            'file' => 'required|mimes:pdf,doc,docx'
        ]);

        $document = new Document();
        $document->title = $request->title;
        if ($request->hasFile('file')) {
            $document->file = $request->file->store('documents', 'public');
        }
        $document->save();

        return redirect()->back()->with('success', 'Success! Document added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        request()->replace($document->toArray());
        request()->flash();

        return view('admin.screens.document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx'
        ]);

        $document->title = $request->title;
        if ($request->hasFile('file')) {
            if ($document->file) {
                unlink(public_path() . "/storage/" . $document->getRawOriginal('file'));
            }
            $document->file = $request->file->store('documents', 'public');
        }
        $document->save();

        return redirect(route('admin.document.index'))->with('success', 'Success! Document added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document->file) {
            unlink(public_path() . "/storage/" . $document->getRawOriginal('file'));
        }
        $document->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
