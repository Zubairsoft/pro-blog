<?php

namespace Domains\Authors\Actions\Profiles;

use App\Http\Requests\Authors\ProfileRequest;
use App\Models\Author;
use Domains\Authors\DataTransferToObject\ProfileData;
use Illuminate\Support\Facades\Auth;

final class UpdateProfileAction
{
    public function __invoke(ProfileRequest $request): Author
    {

    }
}
