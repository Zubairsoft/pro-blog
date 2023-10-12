<?php

namespace Domains\Supports\Helpers;

use App\Models\Admin;
use Illuminate\Notifications\Notification;

class SendNotification
{
    public static function toAdmins(Notification $notification)
    {
        $admins = Admin::query()->active()->get();

        foreach ($admins as $admin) {
            $admin->notify($notification);
        }
    }
}
