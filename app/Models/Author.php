<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Author extends Authenticatable
{
    use HasFactory, HasUuids, HasApiTokens, Notifiable,HasRoles;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'email_verified_at',
        'password',
        'is_active',
    ];

    protected $casts=[
        'email_verified_at'=>'datetime',
        'is_active'=>'boolean',
    ];

    protected $hidden=[
        'password',
    ];
}
