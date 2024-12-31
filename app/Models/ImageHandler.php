<?php

namespace App\Models;

use App\Http\Requests\StorePostRequest;
use Intervention\Image\Facades\Image;

class ImageHandler
{
    public static function fitImage(string $imgPath)
    {
        Image::make(public_path('storage/' . $imgPath))
            ->fit(1200, 1200)
            ->save();
    }

    public static function getImagePath(StorePostRequest $request)
    {
        return $request->image->store('uploads', 'public');
    }
}
