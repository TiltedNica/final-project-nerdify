<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $comment->user_id = auth()->id();
        $comment->post_id = $request->input('post_id');
        $comment->text = $request->input('text');
        $comment->save();
    }

    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }
}
