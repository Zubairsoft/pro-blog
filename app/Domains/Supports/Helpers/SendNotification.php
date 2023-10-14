<?php

namespace Domains\Supports\Helpers;

use App\Models\Admin;
use Domains\Supports\Enums\RoleEnum;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class SendNotification
{
    public static function toAdmins(Notification $notification)
    {
        $admins = Admin::query()->active()->get();

        FacadesNotification::send($admins, $notification);
    }

    public static function toSuperAdmin(Notification $notification)
    {
        $admin = Admin::query()->role(RoleEnum::SUPER_ADMIN)->active()->firstOrFail();

        $admin->notify($notification);
    }
}
