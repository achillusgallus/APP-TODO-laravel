@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Post Created</h1>
    <div class="alert alert-success">
        The post has been successfully created.
    </div>
    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
    <a href="{{ route('posts.create') }}" class="btn btn-dark">Create Another Post</a>
</div>
@endsection