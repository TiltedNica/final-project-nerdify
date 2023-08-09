<?php

namespace App\Http\Controllers;

use App\Models\TemporaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteTemporaryImageController extends Controller
{
    public function __invoke($folder)
    {
        $temporaryImage = TemporaryImage::where('folder', $folder)->first();
        if ($temporaryImage) {
            Storage::deleteDirectory('images/tmp/' . $temporaryImage->folder);
            $temporaryImage->delete();
        }

        return '';
    }
}
