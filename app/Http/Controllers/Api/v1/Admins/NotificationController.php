<?php

namespace App\Http\Controllers\Api\v1\Admins;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admins\Notifications\NotificationResource;
use Domains\Admins\Actions\Notifications\IndexAdminNotificationAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(): JsonResponse
    {
        $notifications=(new IndexAdminNotificationAction)();
        
        return sendSuccessResponse(__('messages.get_data'),NotificationResource::make($notifications));
    }
}
