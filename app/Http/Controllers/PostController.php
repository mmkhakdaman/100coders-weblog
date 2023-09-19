<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', [
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create(
            [
                'title' => $request->title,
                'content' => $request->content,
                'description' => $request->description,
                'user_id' => auth()->id(),
                'banner_url' => $request->file('banner')->store('banners', 'public')
            ]
        );


        $post->tags()->attach($request->tag_ids);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', [
            'post' => $post,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // $data = $request->validated();
        // $post->update($data);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'description' => $request->description,
        ];

        if ($request->hasFile('banner')) {
            $data['banner_url'] = $request->file('banner')->store('banners', 'public');
            File::delete(public_path($post->banner_url));
        }

        $post->update($data);

        $post->tags()->sync($request->tag_ids);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        File::delete(public_path($post->banner_url));
        $post->delete();

        return redirect()->route('posts.index');
    }
}
