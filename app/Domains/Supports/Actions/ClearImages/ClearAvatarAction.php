<?php

namespace Domains\Supports\Action\ClearImages;

use Illuminate\Support\Facades\Auth;

final class ClearAvatarAction
{
    public function __invoke()
    {
        $user = Auth::user();

        $user->clearMediaCollection('avatar');

    }
}
