<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ImageService;
use Inertia\Inertia;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return Inertia::render('User', [
            'posts' => new PostResource($posts)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        $user = User::with(['followers', 'followings', 'savedPosts'])->where('username', $username)->firstOrFail();
        $date = $user->created_at->calendar();
        $isFollowing = $user->isFollowing(auth()->user());
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $userForHidden = auth()->user();
        $hiddenPosts = $userForHidden->hiddenPosts->pluck('id')->toArray();

        $visiblePosts = $posts->reject(function ($post) use ($hiddenPosts) {
            return in_array($post->id, $hiddenPosts);
        });

        $images = $user->posts()->withCount('images')->get()->sum(function ($post){
            return $post->images_count;
        });
        $likes = $user->posts()->withCount('likes')->get()->sum(function ($post){
            return $post->likes_count;
        });
        $postsWithIsSaved = $visiblePosts->map(function ($post) use ($user) {
            $post->is_saved = $user->savedPosts->contains('id', $post->id);
            $post->saved_count = $post->usersWhoSaved->count();
            return $post;
        });
        return Inertia::render('User', [
            'isFollowing'=>$isFollowing,
            'images'=>$images,
            'likes'=>$likes,
            'user'=> $user,
            'date'=> $date,
            'posts' => new PostResource($postsWithIsSaved),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return Inertia::render('Profile/Partials/UpdateProfileInformationForm', ['user'=>$user]);
    }

    public function showPhotos(string $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $postsDesc = Post::with('images')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $postsAsc = Post::with('images')->where('user_id', $user->id)->orderBy('created_at', 'asc')->get();
        return Inertia::render('Photos', ['postsDesc'=>$postsDesc, 'postsAsc'=>$postsAsc]);
    }

    public function update(Request $request)
    {
        $request->validate(['image'=>'nullable|mimes:jpg,jpeg,png', 'banner_picture'=>'nullable|mimes:jpg,jpeg,png']);
        $user = (new ImageService)->updateImage(auth()->user(), $request);
        $user->save();
        $banner= (new ImageService)->updateBanner(auth()->user(), $request);
        $banner->save();

        return redirect(route('user.show', auth()->user()));
    }


}
