<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Image;
use App\Models\Post;
use App\Models\TemporaryImage;
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
        return Inertia::render('Posts', [
            'posts' => new PostResource($posts)
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
