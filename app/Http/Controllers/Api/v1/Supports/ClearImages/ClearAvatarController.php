<?php

namespace App\Http\Controllers\Api\v1\Supports\ClearImages;

use App\Http\Controllers\Controller;
use Domains\Supports\Action\ClearImages\ClearAvatarAction;
use Illuminate\Http\JsonResponse;

class ClearAvatarController extends Controller
{
    public function __invoke(): JsonResponse
    {
        (new ClearAvatarAction)();

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
