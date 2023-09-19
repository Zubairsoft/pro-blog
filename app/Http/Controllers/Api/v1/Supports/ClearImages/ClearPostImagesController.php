<?php

namespace App\Http\Controllers\Api\v1\Supports\ClearImages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supports\ClearImages\ClearImageRequest;
use Domains\Supports\Action\ClearImages\ClearPostImagesAction;
use Illuminate\Http\JsonResponse;

class ClearPostImagesController extends Controller
{
    public function __invoke(ClearImageRequest $request, string $id): JsonResponse
    {
        (new ClearPostImagesAction)($request, $id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
