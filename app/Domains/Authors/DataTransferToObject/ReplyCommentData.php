<?php

namespace Domains\Authors\DataTransferToObject;

use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelData\Data;

final class ReplyCommentData extends Data
{

    public function __construct(
        public ?string $reply,
        public ?string $user_id,
        public ?string $user_type,
    ) {
    }

    public static function fromRequest($request): ReplyCommentData
    {
        $user = Auth::user();
        return new self(
            $request->post('reply'),
            $user->id,
            get_class($user),
        );
    }
}
