<?php

namespace Domains\Admins\Actions\Notifications;

use Illuminate\Support\Facades\Auth;

final class IndexAdminNotificationAction
{
    public function __invoke()
    {
        $admin = Auth::guard(config('auth.admin-api-guard'))->user();

        return $admin->load('notifications')->loadCount('unreadNotifications');
    }
}
