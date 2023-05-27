<?php

namespace Domains\Admins\DataTransferToObject;

use Spatie\LaravelData\Data;

final class AdminData extends Data
{

    public function __construct(
        public ?string  $name,
        public ?string $email,
        public ?string $password,
        public ?bool $is_active,
    ) {
    }

    public static function fromRequest($request): AdminData
    {
        return new self(
            $request->post('name'),
            $request->post('email'),
            $request->post('password'),
            $request->post('is_active')
        );
    }
}
