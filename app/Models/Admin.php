<?php

namespace App\Models;

use App\Models\ModelAttributes\AdminAttributes;
use App\Models\ModelEloquent\AdminEloquent;
use Domains\Supports\Enums\GenderEnum;
use Domains\Supports\Traits\ActivateAccount;
use Domains\Supports\Traits\CommonScopes\ActiveScope;
use Domains\Supports\Traits\HasMediaFromRequest;
use Domains\Supports\Traits\HasSearch;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable  implements HasMedia
{
    use
        HasApiTokens,
        HasFactory,
        Notifiable,
        HasUuids,
        InteractsWithMedia,
        ActivateAccount,
        AdminEloquent,
        AdminAttributes,
        HasRoles,
        HasMediaFromRequest,
        ActiveScope,
        HasSearch;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'password',
        'email_verified_at',
        'local',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'gender' => GenderEnum::class
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile();
    }
}
