@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4 text-black dark:text-gray-300">{{ $post->title }}</h1>

    <p class="text-gray-600 dark:text-gray-400">
        Posted by {{ $post->user->name }} on {{ $post->created_at->format('H:i, d M Y') }}
    </p>

    <div class="mt-6">
        <p class="text-black dark:text-gray-400">{{ $post->content }}</p>
    </div>

    <!-- Comment Section -->
    <div class="mt-6">
        <h2 class="text-xl font-bold mb-4 text-black dark:text-gray-300">Comments</h2>
        <ul class="list-none pl-5">
            @foreach($post->comments as $comment)
                <li class="mb-2">
                    <strong class="text-black dark:text-gray-300">{{ $comment->user->name ?? 'Guest' }} created at {{ $comment->created_at->format('H:i, d M Y') }}:</strong>

                    <p class="text-black dark:text-gray-400 mb-6 mt-1">{{ $comment->comment }}</p>
                    @if(auth()->check() && (auth()->id() === $comment->user_id || auth()->id() === $post->user_id))
						<form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="mt-2">
							@csrf
							@method('DELETE')
							<button type="submit" class="text-red-600 mb-2">Delete</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>

        @auth
            <h4 class="text-lg font-semibold mt-4 text-black dark:text-gray-300">Add a Comment:</h4>
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div>
                    <textarea name="comment" rows="4" class="w-full p-2 border rounded" required></textarea>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary text-black dark:text-gray-400">Submit Comment</button>
                </div>
            </form>
        @else
            <p class="text-gray-600">You must be logged in to add a comment.</p>
        @endauth
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
