<?php

namespace Domains\Admins\Actions\Profiles;

use App\Http\Requests\Admins\ProfileRequest;
use App\Models\Admin;
use Domains\Admins\DataTransferToObject\ProfileData;
use Illuminate\Support\Facades\Auth;

final class UpdateProfileAction
{
    public function __invoke(ProfileRequest $request): Admin
    {
        $attributes = unsetArrayEmptyParam(ProfileData::fromRequest($request)->toArray());

        $admin = Auth::user();

        $admin->update($attributes);

        if ($request->avatar?->isFile()) {
            $admin->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        return $admin;
    }
}
