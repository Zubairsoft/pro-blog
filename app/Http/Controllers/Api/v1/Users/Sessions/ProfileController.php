<?php

namespace App\Http\Controllers\Api\v1\Users\Sessions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Sessions\ProfileRequest;
use App\Http\Resources\Users\Sessions\ProfileResource;
use Domains\Users\Actions\Profiles\ShowProfileAction;
use Domains\Users\Actions\Profiles\UpdateProfileAction;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     *Handle the incoming request for show profile
     *
     * @return JsonResponse
     */
    public function show(): JsonResponse
    {
        $profile = (new ShowProfileAction)();

        return sendSuccessResponse(__('messages.get_data'), ProfileResource::make($profile));
    }


}
