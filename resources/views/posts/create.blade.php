@extends('layouts.app')
@section('title', 'create')
@section('description', 'Create New Post')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label>Title:</label><br>
            <input type="text" name="title" required><br><br>

            <label>Content:</label><br>
            <textarea name="body" required></textarea><br><br>

            <label>Image:</label><br>
            <input type="file" name="image"><br><br>

            <button type="submit">Create Post</button>
        </form>
    </div>
@endsection
