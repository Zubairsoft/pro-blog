<?php

namespace Domains\Users\DataTransferToObject;

use Domains\Supports\Enums\GenderEnum;
use Spatie\LaravelData\Data;

final class UserData extends Data
{

    public function __construct(
        public ?string $first_name,
        public ?string $last_name,
        public ?string $email,
        public ?string $password,
        public ?int $gender,
        public ?string $local,
    ) {
    }

    public static function fromRequest($request): UserData
    {
        return new self(
            $request->post('first_name'),
            $request->post('last_name'),
            $request->post('email'),
            $request->post('password'),
            self::HandleGender($request->post('gender')),
            $request->post('local'),
        );
    }

    private static function HandleGender($gender): int|null
    {
        if (isset($gender)) {
            return GenderEnum::getValue($gender);
        }

        return null;
    }
}
