<?php

namespace App\Models;

use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;

class ImageHandler
{
    public static function fitImage(string $imagePath, $size = 1200)
    {
        Image::make(public_path('storage/' . $imagePath))
            ->fit($size, $size)
            ->save();
    }

//    public static function getImagePath(StorePostRequest $request)
//    {
//        return $request->image->store('uploads', 'public');
//    }


    public static function uploadAndGetImagePath(string $key, string $folder)
    {
        return request($key)->store($folder . '/', 'public');
    }
}
