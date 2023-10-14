<?php

namespace App\Http\Controllers\Api\v1\Authors;

use App\Http\Controllers\Controller;
use Domains\Authors\Actions\Notifications\IndexAuthorNotificationAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(): JsonResponse
    {
        $notifications=(new IndexAuthorNotificationAction)();
        
        return sendSuccessResponse(__('messages.get_data'),$notifications);
    }
}
