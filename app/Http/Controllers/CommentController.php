<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Store a new comment
    public function store(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->comment = $request->input('comment');
        $comment->user_id = auth()->id(); // If the user is logged in

        $comment->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Comment added successfully!');
    }

    // Delete a comment
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Only the comment owner or post owner can delete the comment
        if (auth()->id() === $comment->user_id || auth()->id() === $comment->post->user_id) {
            $comment->delete();
            return back()->with('success', 'Comment deleted successfully!');
        }

        return back()->with('error', 'Unauthorized action.');
    }
}

