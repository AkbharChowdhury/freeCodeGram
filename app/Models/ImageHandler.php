<?php

namespace App\Models;

use Intervention\Image\Facades\Image;

class ImageHandler
{
    public static function resize(string $imagePath, $size = 1200): void
    {
        Image::make(public_path('storage/' . $imagePath))
            ->fit($size, $size)
            ->save();
    }

    public static function getImagePath(string $image) : string
    {
        return '/storage/'.$image;

    }



    public static function save(string $folder, string $key='image')
    {
        return request($key)->store($folder . '/', 'public');
    }
}
