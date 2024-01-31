<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'body',
        'topic_id',
        'flg_main_banner',
        'tagline'
    ];

    protected $casts = [
        'flg_main_banner' => 'boolean',
    ];


    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
