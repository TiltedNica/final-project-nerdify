<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Image;
use App\Models\Post;
use App\Models\TemporaryImage;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        // Obtener los IDs de los posts ocultos del usuario
        $user = auth()->user();
        $hiddenPostsIds = $user->hiddenPosts->pluck('id')->toArray();

        // Filtrar los posts ocultos
        $visiblePosts = $posts->reject(function ($post) use ($hiddenPostsIds) {
            return in_array($post->id, $hiddenPostsIds);
        });

        $postsWithIsSavedAndCount = $visiblePosts->map(function ($post) use ($user) {
            $post->is_saved = $user->savedPosts->contains('id', $post->id);
            $post->saved_count = $post->usersWhoSaved->count();
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
