@extends('layouts.app')

@section('title') Show @endsection

@section('content')

@foreach ($post as $onePost)
<div class="card">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title :- {{$onePost->title}}</h5>
    <p class="card-text">Description :-</p>
    <p class="card-text">{{$onePost->description}}</p>
   
  </div>
</div>

<div class="card mt-5">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <p class="card-text">Name :- {{$onePost->user->name}}</p>
    <p class="card-text">Email :- {{$onePost->user->email}}</p>
    <!-- <p class="card-text">Created AT :- {{$onePost->user->created_at}}</p> -->
    <p class="card-text"> Created at:- {{ \Carbon\Carbon::parse($onePost->user->created_at)->format('Y-m-d')}}</p>
   @endforeach
  </div>
</div>
@endsection