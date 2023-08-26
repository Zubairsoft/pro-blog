<?php

namespace Domains\Admins\Actions\Sessions;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Admins\Sessions\LoginAdminRequest;
use App\Models\Admin;
use Domains\Admins\Specification\Admin\IsActiveSpecification;
use Domains\Admins\Specification\Admin\IsVerifiedEmailSpecification;
use Illuminate\Support\Facades\Auth;

class LoginAdminAction
{
    public function __invoke(LoginAdminRequest $request)
    {
        Auth::shouldUse(config('auth.admin-web-guard'));

        if (!Auth::attempt($request->validated())) {
            throw new LogicException(__('auth.failed'), 422);
        }

        $admin = Auth::user();

        if (!(new IsVerifiedEmailSpecification())->isAllowed($admin)) {
            throw new LogicException(__('auth.verify_email'), 422);
        }

        if (!(new IsActiveSpecification())->isAllowed($admin)) {
            throw new LogicException(__('exceptions.is_not_active_account'), 422);
        }

        $admin['token'] = $admin->createToken('adminAccessToken')->plainTextToken;

        return $admin;
    }
}
