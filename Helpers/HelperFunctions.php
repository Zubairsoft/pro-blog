<?php

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

function unsetArrayEmptyParam(array $array): array
{
    foreach ($array as $key => $value) {
        if (!isset($array[$key])) {

            unset($array[$key]);
        }
    }

    return $array;
}

function generateOtp(): int
{
    return random_int(100000, 999999);
}

function isAuthenticated(): bool
{
    return Auth::guard(config('auth.admin-api-guard'))->check() or Auth::guard(config('auth.author-api-guard'))->check() or Auth::guard(config('auth.user-api-guard'))->check();
}

function getAuthenticatedUser(): User | null
{
    $guards = config('auth.guards');

    foreach ($guards as $guard => $value) {
        if (Auth::guard($guard)->check()) {
            return Auth::guard($guard)->user();
        }
    }

    return null;
}
