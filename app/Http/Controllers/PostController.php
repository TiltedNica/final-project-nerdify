<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Image;
use App\Models\Post;
use App\Models\TemporaryImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $followedUserIds = $user->followings->pluck('id')->toArray();
        $followedUserIds[] = $user->id;
        $hiddenPostsIds = $user->hiddenPosts->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $followedUserIds)->orderBy('created_at', 'desc')->get();

        $visiblePosts = $posts->reject(function ($post) use ($hiddenPostsIds) {
            return in_array($post->id, $hiddenPostsIds);
        });

        $postsWithIsSavedAndCount = $visiblePosts->map(function ($post) use ($user) {
            $post->is_saved = $user->savedPosts->contains('id', $post->id);
            $post->saved_count = $post->usersWhoSaved->count();
            $post->is_following = $post->user->isFollowing(auth()->user());
            return $post;
        });

        return Inertia::render('Posts', [
            'posts' => new PostResource($postsWithIsSavedAndCount)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
        ]);

       $post = Post::create([
            'user_id'=>auth()->user()->id,
            'text'=>$request->text
        ]);

        $temporaryImages = TemporaryImage::whereIn('folder', $request->images)->get();
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('images/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file, 'images/' . $temporaryImage->folder . '/' . $temporaryImage->file);
            Image::create([
                'post_id' => $post->id,
                'name' => $temporaryImage->file,
                'path' => $temporaryImage->folder . '/' . $temporaryImage->file,
            ]);
            Storage::deleteDirectory('images/tmp/' . $temporaryImage->folder);
            $temporaryImage->delete();
        }
    }

    public function hide(Post $post)
    {
        $user = auth()->user();

        // Verificar si ya existe una entrada en la tabla hidden_posts
        if (!$user->hiddenPosts->contains('id', $post->id)) {
            $user->hiddenPosts()->attach($post);
        }

        return redirect()->back();
    }

    public function hideAllUserPosts(User $user)
    {
        $posts = $user->posts;
        $currentUser = auth()->user();
        foreach ($posts as $post){
            $currentUser->hiddenPosts()->attach($post);
        }

        return redirect()->back();
    }


    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (!empty($post->image)){
            $currentImage = public_path().$post->image;
            if (file_exists($currentImage)){
                unlink($currentImage);
            }
        }
        $post->delete();
    }
}
