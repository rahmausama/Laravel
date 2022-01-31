<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        // $allPosts = [
        //     ['title' => 'First Post', 'posted_by'=> 'Ahmed', 'created_at' => '2022-01-20'],
        //     ['title' => 'Second Post', 'posted_by'=> 'Mohamed', 'created_at' => '2022-01-20'],
        //     ['title' => 'Third Post', 'posted_by'=> 'Ali', 'created_at' => '2022-01-20'],
        // ];
        $allPosts=Post::all();

        return view('posts.index', [
            'allPosts' => $allPosts
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', [
            'users' => $users
        ]);
    }

    public function store()
    {
        // dd('test'); any logic after dd won't be executed
        //the logic to store post in the db
        $data = request()->all();
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        //query in db select * from posts where id = $postId
        //return $postId;
        $post=Post::all()->where('id', $postId);

        return view('posts.show', ['post' => $post]);
    }
    public function edit($postId)
    {
        $post = Post::all()->where('id', $postId);
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update($id)
    {
        $data = request()->all();
        DB::table('posts')->where('id', $id)->update([
            'title'=>$data['title'],
            'description'=>$data['description'],
        ]);
        
        return redirect()->route('posts.index');
    }
    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect()->route('posts.index');
    }
}
