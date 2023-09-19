<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::paginate(10);

        return view('tags.index', [
            'tags' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        auth()->user()->tags()->create($request->input());

        // User::where('id',auth()->id())->tags()->create($request->input);

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('tags.show', [
            'tag' => $tag
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        if ($tag->user_id != auth()->id()) {
            abort(403);
        }

        return view('tags.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        if ($tag->user_id != auth()->id()) {
            abort(403);
        }

        // $tag->update([
        //     'title' => $request->title
        // ]);

        $tag->update($request->input());

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
