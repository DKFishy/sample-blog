<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    public function viewAny(User $user)
    {
        return true; // Any user can view posts list
    }
    
    public function view(User $user, Post $post)
    {
        return true; // Any user can view a post
    }
    
    public function create(User $user)
    {
        return true; // Any authenticated user can create posts
    }
    
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id; // Only the post author can update it
    }
    
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id; // Only the post author can delete it
    }
}
