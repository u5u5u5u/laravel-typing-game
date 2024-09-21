<?php

namespace App\Http\Controllers;

use App\Models\Sentence;
use Illuminate\Http\Request;

class SentenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sentences = Sentence::with('user')->latest()->get();
        return view('sentences.index', compact('sentences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sentences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sentence' => 'required|max:255',
        ]);

        $request->user()->sentences()->create($request->only('sentence'));

        return redirect()->route('sentences.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sentence $sentence)
    {
        return view('sentences.show', compact('sentence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sentence $sentence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sentence $sentence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sentence $sentence)
    {
        //
    }
}
