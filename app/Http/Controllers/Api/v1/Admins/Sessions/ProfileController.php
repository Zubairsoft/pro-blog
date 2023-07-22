<?php

namespace App\Http\Controllers\Api\v1\Admins\Sessions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\ProfileRequest;
use App\Http\Resources\Admins\Profiles\ProfileResource;
use Domains\Admins\Actions\Profiles\ShowProfileAction;
use Domains\Admins\Actions\Profiles\UpdateProfileAction;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{

    /**
     * Show admin profile
     * 
     * @return JsonResponse
     */
    public function show(): JsonResponse
    {
        $admin = (new ShowProfileAction)();

        return sendSuccessResponse(__('messages.get_data'), ProfileResource::make($admin));
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
        $admin = (new UpdateProfileAction)($request);

        return sendSuccessResponse(__('messages.update_data'), ProfileResource::make($admin));
    }
}
