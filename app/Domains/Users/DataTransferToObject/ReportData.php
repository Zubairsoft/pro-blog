<?php

namespace Domains\Users\DataTransferToObject;

use Domains\Supports\Enums\GenderEnum;
use Spatie\LaravelData\Data;

final class ReportData extends Data
{

    public function __construct(
        public ?string $writable_id,
        public ?string $writable_type,
        public ?string $reason,
    ) {
    }

    public static function fromRequest($request): ReportData
    {
        $user=getAuthenticatedUser();
        return new self(
            $user->id,
            get_class($user),
            $request->post('reason'),
        );
    }

}
