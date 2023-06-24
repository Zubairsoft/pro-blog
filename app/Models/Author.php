<?php

namespace App\Models;

use App\Models\ModelEloquent\AuthorEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Author extends Authenticatable
{
    use HasFactory, HasUuids, HasApiTokens, Notifiable,AuthorEloquent, HasRoles;

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

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}
