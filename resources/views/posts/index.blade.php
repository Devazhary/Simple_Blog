@extends('layouts.app')
@section('title', 'home')
@section('description', 'My Simple Blog')
@section('content')
    <div class="container">
        <h2>All Posts</h2>
        @if ($posts->count() == 0)
            <h4>No posts found</h4>
        @else
            @foreach ($posts as $post)
                <div class="post-card">
                    <img src="{{ asset('storage/images/blog/posts/' . $post->image) }}">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                    <a href="{{ route('posts.show', $post->id) }}"><button>Read More</button></a>
                </div>
            @endforeach
            {{ $posts->links() }}
        @endif
    </div>
@endsection
