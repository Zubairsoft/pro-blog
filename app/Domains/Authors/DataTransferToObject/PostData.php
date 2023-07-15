<?php

namespace Domains\Authors\DataTransferToObject;

use App\Http\Requests\Authors\PostRequest;
use Spatie\LaravelData\Data;

final class PostData extends Data
{
    public function __construct(
        public ?string $title_ar,
        public ?string $title_en,
        public ?string $description_ar,
        public ?string $description_en,
        public ?string $is_publish_ar,
        public ?string $is_publish_en,
    ) {
    }

    static function fromRequest(PostRequest $request): PostData
    {
        return new self(
            $request->post('title_ar'),
            $request->post('title_en'),
            $request->post('description_ar'),
            $request->post('description_en'),
            $request->post('is_publish_ar'),
            $request->post('is_publish_en'),
        );
    }
}
