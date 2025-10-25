@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Post Updated</h1>
    <div class="alert alert-success">
        The post has been successfully updated.
    </div>
    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
    <a href="{{ route('posts.create') }}" class="btn btn-dark">Create New Post</a>
</div>
@endsection