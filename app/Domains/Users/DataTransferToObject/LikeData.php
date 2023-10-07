<?php

namespace Domains\Users\DataTransferToObject;

use Spatie\LaravelData\Data;

final class LikeData extends Data
{

    public function __construct(
        public ?string $userable_id,
        public ?string $userable_type,
    ) {
    }

    public static function data(): array
    {
        $user = getAuthenticatedUser();

        $data = new self(
            $user->id,
            get_class($user),
        );

        return $data->toArray();
    }
}
