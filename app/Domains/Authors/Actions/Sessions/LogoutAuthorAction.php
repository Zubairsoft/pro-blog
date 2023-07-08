<?php

namespace Domains\Authors\Actions\Sessions;

use Illuminate\Support\Facades\Auth;

class LogoutAuthorAction

{
    public function __invoke()
    {
        Auth::user()->currentAccessToken()->delete();
    }
}