@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    @if($post->image)
      <img src="{{ asset('storage/'. $post->image) }}" class="img img-thumbnail mt-3" width="100" />
    @endif
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">retourne en arrière</a>
  </div>
@endsection
