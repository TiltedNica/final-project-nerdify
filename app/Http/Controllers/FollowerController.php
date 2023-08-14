<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use App\Notifications\FollowerNotification;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FollowerController extends Controller
{

    public function index (User $user)
    {
        $followers = $user->followers()->with('followers')->get();
        $followings = $user->followings()->with('followers')->get();

        $followers->each(function ($follower) use ($user) {
            $follower->is_following = $user->isFollowing($follower);
            $follower->is_followed_by = $follower->isFollowedBy($user);
        });

        $followings->each(function ($follower) use ($user) {
            $follower->is_following = $user->isFollowing($follower);
            $follower->is_followed_by = $follower->isFollowedBy($user);
        });

        return Inertia::render('Friends', [
            'followers'=>[$followers],
            'followings'=>[$followings],
            'profile'=>[
                'user'=>$user,
            ],

        ]);
    }

    public function store(User $user, Request $request)
    {

        $user->followers()->attach(auth()->user()->id);
        $user->notify(new FollowerNotification(auth()->user()));
        return redirect()->back();
    }

    public function destroy(User $user, Request $request)
    {
        $user->followers()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
