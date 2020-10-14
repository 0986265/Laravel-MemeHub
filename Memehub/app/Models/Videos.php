<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Videos
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $urlid
 * @property string $category
 * @property string $status
 * @property string $user
 * @property int $likes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Videos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Videos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Videos query()
 * @method static \Illuminate\Database\Eloquent\Builder|Videos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Videos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Videos whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Videos whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Videos whereUrl($value)
 * @mixin \Eloquent
 */
class Videos extends Model
{
    use HasFactory;
    public $fillable = [
        'urlid',
        'title',
        'url',
        'category',
        'status',
        'user',
        'likes'
    ];
}
