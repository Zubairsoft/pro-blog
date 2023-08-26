<?php

namespace Domains\Admins\Actions\Profiles;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

final class ShowProfileAction
{
    public function __invoke(): Admin
    {
        return Auth::user();
    }
}
