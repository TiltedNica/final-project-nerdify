<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ImageService;
use Inertia\Inertia;

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
        $user = User::where('username', $username)->firstOrFail();
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return Inertia::render('User', [
            'user'=> $user,
            'posts' => new PostResource($posts)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return Inertia::render('Profile/Partials/UpdateProfileInformationForm', ['user'=>$user]);
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
