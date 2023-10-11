<?php

namespace Domains\Users\Actions\Profiles;

use App\Http\Requests\Users\Sessions\ProfileRequest;
use App\Models\User;
use Domains\Users\DataTransferToObject\UserData;
use Illuminate\Support\Facades\Auth;

class UpdateProfileAction
{
    public function __invoke(ProfileRequest $request): User
    {
        $attributes = unsetArrayEmptyParam(UserData::fromRequest($request)->toArray());

        $user = Auth::guard('api')->user();

        $user->update($attributes);

        $user->AddImageFromRequestIfExists($request, 'avatar', 'avatar');

        return $user;
    }
}
