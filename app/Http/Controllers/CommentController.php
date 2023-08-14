<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\CommentPostNotification;
use App\Notifications\LikedPostNotification;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['text'=>'required']);
        $comment = new Comment;
        $postId = $request->input('post_id');


        $comment->user_id = auth()->id();
        $comment->post_id = $request->input('post_id');
        $comment->text = $request->input('text');
        $comment->save();

        $post = Post::findOrFail($postId);
        if ($post->user_id !== auth()->user()->id){
            $post->user->notify(new CommentPostNotification($post, auth()->user()));
        }

    }

    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }
}
