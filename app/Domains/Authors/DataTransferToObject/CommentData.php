<?php

namespace Domains\Authors\DataTransferToObject;

use Spatie\LaravelData\Data;

final class CommentData extends Data
{

    public function __construct(
        public ?string  $comment,
    ) {
    }

    public static function fromRequest($request): CommentData
    {
        return new self(
            $request->post('comment'),
        );
    }
}
