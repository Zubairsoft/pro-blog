<?php

namespace Domains\Admins\DataTransferToObject;

use Spatie\LaravelData\Data;

final class TagData extends Data
{

    public function __construct(
        public ?string  $name_ar,
        public ?string $name_en,
        public ?bool $is_active,
    ) {
    }

    public static function fromRequest($request): TagData 
    {
        return new self(
            $request->post('name_ar'),
            $request->post('name_en'),
            $request->boolean('is_active'),

        );
    }
}
