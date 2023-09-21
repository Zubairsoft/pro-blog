<?php

namespace Domains\Supports\Traits;

use Illuminate\Support\Carbon;

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

    public function hourIsPast(): bool
    {
        return Carbon::parse($this->created_at)->isPast();
    }
}
