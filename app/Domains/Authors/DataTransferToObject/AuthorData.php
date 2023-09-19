<?php

namespace Domains\Authors\DataTransferToObject;

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
        public ?bool $local
    ) {
    }

    public static function fromRequest($request)
    {
        return new self(
            $request->post('first_name'),
            $request->post('last_name'),
            $request->post('email'),
            $request->post('password'),
            $request->post('is_active'),
            $request->post('gender'),
            $request->post('local'),
        );
    }
}
