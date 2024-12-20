@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-black dark:text-gray-300">Sample Blog Posts</h1>
        
        <!-- Success Message -->
        @if(session('success'))
            <success-message message="{{ session('success') }}"></success-message>
        @endif
        
        <!-- Create New Post Button -->
        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary text-black dark:text-gray-400">Create New Post</a>
        @endauth
	        
        <!-- Posts List -->
        <div class="mt-6">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="card mt-4 text-black dark:text-gray-400 mb-6">
                        <div class="card-body">
                            <h5 class="card-title text-xl font-semibold">{{ $post->title }}</h5>
                            <p class="card-text text-gray-700">{{ Str::limit($post->body, 100) }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info mt-2 inline-block mr-2">Read More</a>
                            
                            @if ($post->user_id == auth()->id())
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning mt-2 inline-block mr-2">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-2 inline-block mr-2">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-gray-500">No posts available.</p>
            @endif
        </div>
    </div>
@endsection
