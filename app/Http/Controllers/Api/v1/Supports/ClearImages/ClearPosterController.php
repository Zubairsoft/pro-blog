<?php

namespace App\Http\Controllers\Api\v1\Supports\ClearImages;

use App\Http\Controllers\Controller;
use Domains\Supports\Actions\ClearImages\ClearPosterAction;
use Illuminate\Http\JsonResponse;

class ClearPosterController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        (new ClearPosterAction)($id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
