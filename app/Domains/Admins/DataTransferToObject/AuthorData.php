<?php

namespace Domains\Admins\DataTransferToObject;

use Domains\Supports\Enums\GenderEnum;
use Spatie\LaravelData\Data;

final class AuthorData extends Data
{

    public function __construct(
        public ?string $first_name,
        public ?string $last_name,
        public ?string $email,
        public ?string $password,
        public ?bool $is_active,
        public ?int $gender,
        public ?bool $local,
        public ?string $email_verified_at,
    ) {
    }

    public static function fromRequest($request): AuthorData
    {
        return new self(
            $request->post('first_name'),
            $request->post('last_name'),
            $request->post('email'),
            $request->post('password'),
            $request->post('is_active') ? $request->boolean('is_active') : null,
            self::HandleGender($request->post('gender')),
            $request->post('local'),
            now()
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
