<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageService
{
    public function updateImage($model, $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $name = time() . '.' . $extension;
            $path = $file->storeAs('img', $name, 'public');

            if (!empty($model->image)) {
                $currentImage = public_path($model->image);
                if (file_exists($currentImage) && $currentImage != public_path('/img/default-image.jpg')) {
                    unlink($currentImage);
                }
            }

            $model->image = '/storage/img/' .$name;
        }

        return $model;
    }
    public function updateBanner($model, $request)
    {

        if ($request->hasFile('banner_picture')) {
            $file = $request->file('banner_picture');
            $extension = $file->getClientOriginalExtension();
            $name = time()*5 . '.' . $extension;
            $path = $file->storeAs('img', $name, 'public');

            if (!empty($model->banner_picture)) {
                $currentImage = public_path($model->banner_picture);
                if (file_exists($currentImage) && $currentImage != public_path('/img/Cover.png')) {
                    unlink($currentImage);
                }
            }

            $model->banner_picture = '/storage/img/' .$name;
        }

        return $model;


    }
}
