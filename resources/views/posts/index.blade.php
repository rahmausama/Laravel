@extends('layouts.app')

@section('title')Index @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($allPosts as $post)
              <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ isset($post->user) ? $post->user->name : 'Not Found' }}</td>
                <td>{{ $post['created_at'] }}</td>
                <td>
                    <a href="{{ route('posts.show',[$post['id']])}}"class="btn btn-primary">View</a>
                </td>
                <td>
                    <a href="{{ route('posts.edit',[$post['id']])}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
@endsection
    