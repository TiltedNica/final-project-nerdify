<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Notifications\LikedPostNotification;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 'post_id' => 'required' ]);
        $like = new Like();
        $postId = $request->input('post_id');

        $like->user_id = auth()->user()->id;
        $like->post_id = $postId;
        $like->save();

        $post = Post::findOrFail($postId);
        if ($post->user_id !== auth()->user()->id){
            $post->user->notify(new LikedPostNotification($post, auth()->user()));
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $like = Like::find($id);
        if (count(collect($like)) > 0) {
            $like->delete();
        }
    }
}
