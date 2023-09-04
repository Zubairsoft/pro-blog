<?php

namespace App\Models;

use App\Models\ModelAttributes\AuthorAttributes;
use App\Models\ModelEloquent\AuthorEloquent;
use Domains\Supports\Traits\ActivateAccount;
use Domains\Supports\Traits\HasMediaFromRequest;
use Domains\Supports\Traits\HasSearch;
use Illuminate\Database\Eloquent\Builder;
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
    use HasFactory, HasUuids, HasApiTokens, Notifiable, AuthorEloquent, AuthorAttributes, HasRoles, InteractsWithMedia, ActivateAccount, HasMediaFromRequest, HasSearch;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'email_verified_at',
        'password',
        'is_active',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
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

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}
