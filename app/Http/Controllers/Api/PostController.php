<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all();
        return PostResource::collection($allPosts);
    }
    public function show($postId)
    {
        $post = Post::find($postId);
        return new PostResource($post);
    }
    public function store(StorePostRequest $request)
    {
        // dd('test'); any logic after dd won't be executed
        //the logic to store post in the db
        $data = request()->all();
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            
        ]);
        return new PostResource($data);
    }
}
