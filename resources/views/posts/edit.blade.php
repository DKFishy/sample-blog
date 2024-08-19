@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4 text-black dark:text-gray-300">Edit Post</h1>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit Post Form --}}
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-black dark:text-gray-400">Title</label>
            <input type="text" class="form-control w-full mt-1" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="body" class="block text-black dark:text-gray-400">Body</label>
            <textarea class="form-control w-full mt-1" id="body" name="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary text-black dark:text-gray-400">Update Post</button>
    </form>
</div>
@endsection
