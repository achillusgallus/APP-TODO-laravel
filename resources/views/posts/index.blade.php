@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <h1>Posts</h1>
      </div>
      <div class="col-sm-4">
       <a href="{{ route('posts.create') }}" class="btn btn-dark">Créer un nouveau post</a>
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Content</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>
              @if($post->image)
                <img src="{{ asset('storage/'. $post->image) }}" class="img img-thumbnail" width="50" />
              @else
                No Image
              @endif
            </td>
            <td>
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">Show</a>
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('es-tu sûre de vouloir suprimer ça?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $posts->links() }}
  </div>
@endsection
