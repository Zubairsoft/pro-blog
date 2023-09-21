<?php

namespace Domains\Admins\DataTransferToObject;

use Domains\Supports\Enums\GenderEnum;
use Spatie\LaravelData\Data;

final class AdminData extends Data
{

    public function __construct(
        public ?string $name,
        public ?string $email,
        public ?string $password,
        public ?bool $is_active,
        public ?int $gender,
        public ?string $local
    ) {
    }

    public static function fromRequest($request): AdminData
    {
        return new self(
            $request->post('name'),
            $request->post('email'),
            $request->post('password'),
            $request->post('is_active') ? $request->boolean('is_active') : null,
            self::HandleGender($request->post('gender')),
            $request->post('local')
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
