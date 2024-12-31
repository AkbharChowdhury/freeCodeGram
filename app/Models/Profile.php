<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $guarded = [];
    public function user(): BelongsTo
    {
//        App\Model\

        return $this->belongsTo(User::class);
    }
}
