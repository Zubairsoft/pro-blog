<?php

namespace Domains\Authors\DataTransferToObject\Sessions;

use Spatie\LaravelData\Data;

class RegisterAuthorData extends Data
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $password,
        public int $gender,
        public ?string $local
    ) {
    }

    public static function fromRequest($request)
    {
        return new self(
            $request->post('first_name'),
            $request->post('last_name'),
            $request->post('email'),
            $request->post('password'),
            $request->post('gender'),
            $request->post('local'),
        );
    }
}
