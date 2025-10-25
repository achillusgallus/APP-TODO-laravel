@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Delete Post</h1>
    <div class="alert alert-danger">
        <strong>Are you sure you want to delete this post?</strong>
    </div>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" class="form-control" value="{{ $post->title }}" disabled>
        </div>
        @if($post->image)
            <div class="mb-3">
                <label class="form-label">Image:</label><br>
                <img src="{{ asset('storage/' . $post->image) }}" class="img img-thumbnail" width="100" />
            </div>
        @endif
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection