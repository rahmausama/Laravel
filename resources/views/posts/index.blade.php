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
                <!-- <td>{{ $post['created_at'] }}</td> -->
                <td>{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}}</td>

                <td>
                    <a href="{{ route('posts.show',[$post['id']])}}"class="btn btn-primary">View</a>
                </td>
                <td>
                    <a href="{{ route('posts.edit',[$post['id']])}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <!-- <a href="{{ route('posts.destroy',[$post['id']])}}" class="btn btn-danger">Delete</a> -->
                    <a class="btn btn-danger" href="{{ route('posts.index') }}" 
                   onclick="var message = confirm('Do you want to delete this post ?');
                   if(message){
                   event.preventDefault();
                    document.getElementById(
                      'delete-form-{{$post->id}}').submit();}">
                 Delete 
                </a>
                  </td>
                  <form id="delete-form-{{$post->id}}" 
                  + action="{{route('posts.destroy', $post->id)}}"
                  method="post">
                @csrf @method('DELETE')
            </form>
              </tr>
              @endforeach
            </tbody>
          </table>
          <span>
                {{$allPosts->links()}}
              </span>
              <style>
                .w-5{
                  display: none;
                }
              </style>
@endsection
    