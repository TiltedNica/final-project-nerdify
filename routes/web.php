<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavedPostController;
use App\Http\Controllers\UploadTemporaryImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeleteTemporaryImageController;
use App\Models\Comment;
use Illuminate\Foundation\Application;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SocialController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();
    $user = User::firstOrCreate([
        'google_id' => $user_google->id,
    ], [
        'name'=>$user_google->name,
        'email'=>$user_google->email,
        'image'=>'/img/default-image.jpg',
        'banner_picture'=>'/img/Cover.png',
        'username'=>'user_'.Str::random(8)
    ]);

    Auth::login($user);

    return redirect('/');


    // $user->token
});

Route::get('/user', function () {
    return Inertia::render('User');
});



Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::post('/upload', UploadTemporaryImageController::class);
    Route::delete('/revert/{folder}', DeleteTemporaryImageController::class);

    Route::post('/save-post/{post}', [SavedPostController::class, 'store'])->name('saved-post.store');
    Route::delete('/unsave-post/{post}', [SavedPostController::class, 'destroy'])->name('unsave-post.destroy');

    Route::post('/hide-posts/{post}', [PostController::class, 'hide'])->name('post.hide');
    Route::post('/hide-all-posts/{user}', [PostController::class, 'hideAllUserPosts'])->name('post.hide-all-user-posts');

    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/likes/{id}', [LikeController::class, 'destroy'])->name('likes.destroy');

    Route::get('/user/{user:username}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{user:username}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user:username}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{user:username}/photos', [UserController::class, 'showPhotos'])->name('user.photos');

    Route::get('/user/{user:username}/followings', [FollowerController::class, 'index'])->name('users.followings');
    Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
    Route::delete('/{user:username}/follow', [FollowerController::class, 'destroy'])->name('users.unfollow');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
