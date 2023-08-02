<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageService
{
    public function updateImage($model, $request)
    {
        $image = Image::make($request->file('image'));

        if (!empty($model->image)){
            $currentImage = public_path(). $model->image;
            if (file_exists($currentImage) && $currentImage != public_path() . '/images/user-placeholder.png') {
                unlink($currentImage);
            }
        }

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $name = time() . '.' . $extension;
        $image->save(public_path() . '/img/' . $name);
        $model->image = '/img/' .$name;

        return $model;
    }
}
