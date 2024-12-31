<?php

namespace App\Models;

use Intervention\Image\Facades\Image;

class MyHelper
{




    public static function plural(int $count)
    {
        return $count <= 1 ? '' : 's';
    }
}
