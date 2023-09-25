<?php

namespace App\Models;

use App\Models\ModelAttributes\PostAttributes;
use App\Models\ModelEloquent\PostEloquent;
use Domains\Supports\Traits\HasMediaFromRequest;
use Domains\Supports\Traits\HasSearch;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends BaseModel implements HasMedia
{
    use SoftDeletes;
    use PostEloquent;
    use InteractsWithMedia;
    use PostAttributes;
    use HasMediaFromRequest;
    use HasSearch;

    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'status',
        'is_publish_ar',
        'is_publish_en'
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_publish_ar' => 'boolean',
        'is_publish_en' => 'boolean'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('poster')
            ->singleFile();

        $this
            ->addMediaCollection('post-images');
    }
}
