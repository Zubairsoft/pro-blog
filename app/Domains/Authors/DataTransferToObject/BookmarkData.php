<?php

namespace Domains\Authors\DataTransferToObject;

use App\Http\Requests\Authors\BookmarkRequest;
use Spatie\LaravelData\Data;

final class BookmarkData extends Data
{

    public function __construct(
        public ?string  $post_id,

    ) {
    }

    public static function fromRequest(BookmarkRequest $request): BookmarkData
    {
        return new self(

            $request->post('post_id')
        );
    }
}
