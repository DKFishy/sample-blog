@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4 text-black dark:text-gray-300">{{ $post->title }}</h1>

    <p class="text-gray-600 dark:text-gray-400">
        Posted by {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}
    </p>

    <div class="mt-6">
        <p class="text-black dark:text-gray-400">{{ $post->body }}</p>
    </div>

    <div class="mt-6">
        @if ($post->user_id == auth()->id())
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning text-black dark:text-gray-400 mr-2">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger text-black dark:text-gray-400 mr-2">Delete</button>
            </form>
        @endif
        <a href="{{ route('posts.index') }}" class="btn btn-info text-black dark:text-gray-400 mr-2">Back to Posts</a>
    </div>
</div>
@endsection
