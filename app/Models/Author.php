<?php

namespace App\Models;

use App\Models\ModelAttributes\AuthorAttributes;
use App\Models\ModelEloquent\AuthorEloquent;
use Domains\Supports\Enums\GenderEnum;
use Domains\Supports\Traits\ActivateAccount;
use Domains\Supports\Traits\CommonScopes\ActiveScope;
use Domains\Supports\Traits\HasMediaFromRequest;
use Domains\Supports\Traits\HasSearch;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class Author extends Authenticatable implements HasMedia
{
    use HasFactory,
        HasUuids,
        HasApiTokens,
        Notifiable,
        AuthorEloquent,
        AuthorAttributes,
        HasRoles,
        InteractsWithMedia,
        ActivateAccount,
        HasMediaFromRequest,
        ActiveScope,
        HasSearch;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'email_verified_at',
        'password',
        'local',
        'is_active',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'gender' => GenderEnum::class
    ];

    protected $hidden = [
        'password',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile();
    }

}
