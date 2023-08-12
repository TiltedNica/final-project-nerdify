<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Carbon\Carbon;

class PostResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->map(function ($post){
            return[
                'id'=>$post->id,
                'text'=>$post->text,
                'created_at'=>$post->created_at->diffForHumans(),
                'comments'=>$post->comments->map(function ($comment){
                    return [
                        'id'=>$comment->id,
                        'text'=>$comment->text,
                        'user'=>[
                            'id'=>$comment->user->id,
                            'name'=>$comment->user->name,
                            'image'=>$comment->user->image
                        ]
                    ];
                }),
                'likes'=>$post->likes->map(function ($like){
                    return [
                        'id'=>$like->id,
                        'user_id'=>$like->user_id,
                        'post_id'=>$like->post_id
                    ];
                }),
                'images'=>$post->images->map(function ($image){
                   return [
                       'id'=>$image->id,
                       'post_id'=>$image->post_id,
                       'name'=>$image->name,
                       'path'=>$image->path
                   ];
                }),
                'user'=>[
                    'id'=>$post->user->id,
                    'name'=>$post->user->name,
                    'image'=>$post->user->image,
                    'username'=>$post->user->username,
                ],
                'is_saved'=>$post->is_saved,
                'saved_count'=>$post->saved_count,
            ];
        });
    }
}
