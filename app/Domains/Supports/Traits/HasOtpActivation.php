<?php

namespace Domains\Supports\Traits;

trait HasOtpActivation
{
    public static function generateOtpActivation($email, $type)
    {
        return self::query()->create([
            'email' => $email,
            'otp' => generateOtp(),
            'type' => $type
        ]);
    }
}