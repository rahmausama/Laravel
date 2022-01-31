@extends('layouts.app')

@section('title') Edit @endsection

@foreach ($post as $onePost)
@section('content')
        <form method="POST" action="{{route('posts.update',$onePost->id)}}">
            @csrf
            @method('PUT')  
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$onePost->title}}">
            </div>
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" >{{$onePost->description}}</textarea>  
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select name="post_creator" class="form-control">
                    <option value="{{$onePost->id}}">{{$onePost->user->name}}</option>
                </select>
            </div>
            @endforeach
            
            <button class="btn btn-success">Update Post</button>
        </form>
@endsection