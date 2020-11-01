<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserLikes
 *
 * @property int $userid
 * @property int $videoid
 * @mixin \Eloquent
 */
class UserLikes extends Model
{
    use HasFactory;
    public $fillable = [
        'userid',
        'videoid',
    ];
}
