<?php

namespace Domains\Authors\Actions\Notifications;

use Illuminate\Support\Facades\Auth;

final class IndexAuthorNotificationAction
{
    public function __invoke()
    {
        $author = Auth::guard(config('auth.author-api'))->user();

        return $author->load('notifications')->loadCount('unreadNotifications');
    }
}
