@extends('layouts.app')

@section('title') Show @endsection

@section('content')
<div class="card">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title :- Special title treatment</h5>
    <p class="card-text">Description :-</p>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
   
  </div>
</div>

<div class="card mt-5">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <p class="card-text">Name :- Ahmed</p>
    <p class="card-text">Email :- ahmed@gmail.com</p>
    <p class="card-text">Created AT :- Thursday 25th of December</p>
  </div>
</div>
@endsection