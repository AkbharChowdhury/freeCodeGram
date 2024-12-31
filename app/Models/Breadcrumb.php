<?php

namespace App\Models;

use App\Http\Requests\StorePostRequest;
use Intervention\Image\Facades\Image;

class Breadcrumb
{

    public static function breadcrumb(string  $homeLink, string $title)
    {?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $homeLink ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
            </ol>
        </nav>

<!--        return $request->image->store('uploads', 'public');-->
    <?php
    }
}
