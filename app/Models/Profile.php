<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    private function getDefaultProfileImage(): string
    {
        return 'https://t4.ftcdn.net/jpg/02/15/84/43/360_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg';

    }

    public function profileImage(): string
    {
        return $this->image ? '/storage/' . $this->image : $this->getDefaultProfileImage();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);

    }
}
