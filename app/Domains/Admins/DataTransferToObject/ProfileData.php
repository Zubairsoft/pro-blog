<?php

namespace Domains\Admins\DataTransferToObject;

use App\Http\Requests\Admins\ProfileRequest;
use Spatie\LaravelData\Data;

final class ProfileData extends Data
{

    public function __construct(
        public ?string  $name,
        public ?string $email,
        public ?string $password,
        public ?int $gender,
        public ?bool $local
    ) {
    }

    public static function fromRequest(ProfileRequest $request): ProfileData
    {
        return new self(
            $request->post('name'),
            $request->post('email'),
            $request->post('password'),
            $request->post('gender'),
            $request->post('local')
        );
    }
}
