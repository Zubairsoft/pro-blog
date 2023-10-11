<?php

namespace Domains\Users\Actions\Profiles;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShowProfileAction
{
    public function __invoke(): User
    {
        $user = Auth::guard('api')->user();

        return $user;
    }
}
