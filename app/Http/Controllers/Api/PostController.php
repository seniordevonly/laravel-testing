<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends ApiController
{
    public function index()
    {
        $posts = Post::all();

        return response()->json($posts);
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        return response()->json($post);
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->noContent();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
