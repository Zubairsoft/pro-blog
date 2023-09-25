<?php

namespace Domains\Users\Actions\Sessions;

use Illuminate\Support\Facades\Auth;

class LogoutUserAction

{
    public function __invoke()
    {
        Auth::user()->currentAccessToken()->delete();

    }
}
