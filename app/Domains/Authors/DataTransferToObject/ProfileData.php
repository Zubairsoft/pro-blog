<?php

namespace Domains\Authors\DataTransferToObject;

use App\Http\Requests\Authors\ProfileRequest;
use Spatie\LaravelData\Data;

final class ProfileData extends Data
{

    public function __construct(
        public ?string  $first_name,
        public ?string  $last_name,
        public ?string $email,
        public ?string $password,
        public ?int $gender,
        public ?bool $local
    ) {
    }

    public static function fromRequest(ProfileRequest $request): ProfileData
    {
        return new self(
            $request->post('first_name'),
            $request->post('last_name'),
            $request->post('email'),
            $request->post('password'),
            $request->post('gender'),
            $request->post('local')
        );
    }
}
