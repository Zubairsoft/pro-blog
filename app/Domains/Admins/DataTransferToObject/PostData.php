<?php

namespace Domains\Admins\DataTransferToObject;

use App\Http\Requests\Admins\PostRequest;
use Spatie\LaravelData\Data;

final class PostData extends Data
{
    public function __construct(
      public ?string $title_ar,
      public ?string $title_en,
      public ?string $description_ar,
      public ?string $description_en,
      public ?bool $status,
      public ?string $is_publish_ar,
      public ?string $is_publish_en,
    ) {
    }

    static function fromRequest(PostRequest $request):PostData
    {
        return new self(
            $request->post('title_ar'),
            $request->post('title_en'),
            $request->post('description_ar'),
            $request->post('description_en'),
            $request->boolean('status'),
            $request->boolean('is_publish_ar'),
            $request->boolean('is_publish_en'),
        );
    }
}
