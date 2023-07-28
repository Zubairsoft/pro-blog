<?php

namespace App\Http\Controllers\Api\v1\Authors\Sessions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\ProfileRequest;
use Domains\Authors\Actions\Profiles\UpdateProfileAction;
use Domains\Authors\Actions\Profiles\ShowProfileAction;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{

    /**
     * Handle the incoming request for show profile
     * 
     * @return JsonResponse
     */
    public function show(): JsonResponse
    {
        $author = (new ShowProfileAction)();

        return sendSuccessResponse(__('messages.get_data'), $author);
    }

    /**
     * Handle the incoming request for update profile
     * 
     * @param ProfileRequest $request
     * 
     * @return JsonResponse
     */
    public function update(ProfileRequest $request): JsonResponse
    {
        $author = (new UpdateProfileAction)($request);

        return sendSuccessResponse(__('messages.update'), $author);
    }
}