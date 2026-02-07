<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // show all posts
        $posts = Post::paginate(25);
        return response()->json([
            'posts' => $posts,
            'message' => 'Posts fetched successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // store a new post
        $data = $request->validated();
        $data['user_id']  = $request->user()->id;
        $post = Post::create($data);

        return response()->json([
            'post' => $post,
            'message' => 'Post created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // show the specified post

        return response()->json([
            'post' => $post,
            'messsage' => 'Post fetched successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        // update the specified post
        $data = $request->validated();
        $post->update($data);

        return response()->json([
            'post' => $post,
            'message' => 'Post updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // delete the specified post
        $post->delete();

        return response()->json([
            'post' => $post,
            'message' => 'Post deleted successfully'
        ]);
    }
}
