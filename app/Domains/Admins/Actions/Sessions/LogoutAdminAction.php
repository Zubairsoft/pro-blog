<?php

namespace Domains\Admins\Actions\Sessions;

use Illuminate\Support\Facades\Auth;

class LogoutAdminAction

{
    public function __invoke()
    {
        Auth::user()->currentAccessToken()->delete();

    }
}