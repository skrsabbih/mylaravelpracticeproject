<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExternalApiController extends Controller
{
    // fetch the 3rd party api
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        if ($response->successful()) {
            $posts = collect($response->json())->take(20);
            return response()->json([
                'post' => $posts,
                'message'  => 'Posts fetched successfully'
            ]);
        }

        return $response()->json([
            'message' => 'Something went wrong'
        ], 500);
    }

    public function postsave(Request $request)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        if ($response->successful()) {
            $posts = collect($response->json())->take(10);
            $savePosts = [];

            foreach ($posts as $post) {
                $post = Post::create([
                    'user_id' => $request->user()->id,
                    'title' => $post['title'],
                    'description' => $post['body'],
                ]);

                array_push($savePosts, $post);
            }

            return response()->json([
                'post' => $savePosts,
                'message'  => '10 Posts saved successfully'
            ]);
        }

        return response()->json([
            'message' => 'Something went wrong'
        ], 500);
    }
}
