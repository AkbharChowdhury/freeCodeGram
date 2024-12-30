<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
//    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'caption',
        'image'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }
}
