<?php

use App\Models\OtpActivation;
use Domains\Supports\Enums\LocalEnum;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Carbon;
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
    $guards = config('auth.guards');

    foreach ($guards as $guard => $value) {
        if (Auth::guard($guard)->check()) {
            return true;
        }
    }

    return false;
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

function checkUserIsAuthenticated(): bool
{
    $guards = config('auth.guards');

    foreach ($guards as $guard => $value) {
        if (Auth::guard($guard)->check()) {
            return true;
        }
    }

    return false;
}

function getAuthenticatedGuard()
{
    $guards = config('auth.guards');

    foreach ($guards as $guard => $value) {
        if (Auth::guard($guard)->check()) {
            return $guard;
        }
    }

    return null;
}

function  resendVerificationCode(object $user)
{
    $type = get_class($user);

    $email = $user->email;

    $otpActivation = OtpActivation::query()->where([['email', '=', $email], ['type', '=', $type]])->first();

    switch (!empty($otpActivation)) {
        case true:
            if (Carbon::parse($otpActivation->created_at)->addMinutes(3)->isPast()) {
                $otpActivation->delete();
                OtpActivation::generateOtpActivation($email, $type);
            }
            break;

        default:
            OtpActivation::generateOtpActivation($email, $type);
            break;
    }
}

function translateNotificationTitle($data)
{
    return app()->currentLocale() === LocalEnum::English ? $data['title_en'] : $data['title_ar'];
}

function translateNotificationBody($data)
{
    return app()->currentLocale() === LocalEnum::English ? $data['body_en'] :$data['body_ar'];
}

