@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group mb-3">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" />
        @error('title')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="content">Content</label>
        <textarea rows="3" class="form-control" name="content">{{ old('content', $post->content) }}</textarea>
        @error('content')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" />
        @if($post->image)
          <img src="{{ asset('storage/'. $post->image) }}" class="img img-thumbnail mt-3" width="100" />
        @endif
        @error('image')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-dark">Update Post</button>
      <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
  </div>
@endsection
