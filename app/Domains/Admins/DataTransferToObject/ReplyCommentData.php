<?php

namespace Domains\Admins\DataTransferToObject;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelData\Data;

final class ReplyCommentData extends Data
{

    public function __construct(
        public ?string  $replay,
        public ?string $is_seen,
        public ?string $user_id,
        public ?string $user_type,
    ) {
    }

    public static function fromRequest($request): ReplyCommentData
    {
        return new self(
            $request->post('replay'),
            $request->post('name_en'),
            Auth::user()->id,
            Admin::class,
        );
    }
}
