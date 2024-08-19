@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4 text-black dark:text-gray-300">Create a New Post</h1>

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

    {{-- Create Post Form --}}
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-black dark:text-gray-400">Title</label>
            <input type="text" class="form-control w-full mt-1" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label for="body" class="block text-black dark:text-gray-400">Body</label>
            <textarea class="form-control w-full mt-1" id="body" name="body" rows="5" required>{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary text-black dark:text-gray-400">Create Post</button>
    </form>
</div>
@endsection
