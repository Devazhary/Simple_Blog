@extends('layouts.app')
@section('title', 'show')
@section('description', 'Post Details')
@section('content')
    {{-- Post Details --}}
    <div class="container">
        <div class="post-card">
            <img src="{{ asset('storage/images/blog/posts/' . $post->image) }}">
            <h1>{{ $post->title }}</h1>
            <p>
                {{ $post->body }}
            </p>
        </div>
    </div>
@endsection
