<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $search =  $request->query('search');
        $tag =  $request->query('tag');
        $posts = Post::when($search != null, function ($query) use ($search) {
            $query->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        })
            ->when($tag != null, function ($query) use ($tag) {
                $query->whereHas('tags', function ($query) use ($tag) {
                    $query->whereIn('id', $tag);
                }, '>=', count($tag));
            })
            ->paginate(10);

        $tags = Tag::all();
        return view('posts.index', [
            'posts' => $posts,
            'tags' => $tags
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
