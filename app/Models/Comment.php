<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'post_id'];

    // Define the relationship with the User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Post model
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
