@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> -->
        <button type="submit" class="btn btn-dark">Create</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

    <hr>

    <h2>Posts créés</h2>
    @if(isset($posts) && $posts->count())
        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <strong>{{ $post->title }}</strong>
                    @if($post->image)
                        <br>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Image" width="100">
                    @endif
                </li>
            @endforeach
        </ul>
        <div class="mt-3">
            {{ $posts->links() }}
        </div>
    @else
        <p>Aucun post créé pour le moment.</p>
    @endif
</div>
@endsection

