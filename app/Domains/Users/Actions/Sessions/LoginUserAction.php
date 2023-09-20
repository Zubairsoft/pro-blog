<?php

namespace Domains\Users\Actions;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Users\Sessions\LoginUserRequest;
use Domains\Users\Specification\ActiveAccountSpecification;
use Domains\Users\Specification\VerifiedEmailSpecification;
use Illuminate\Support\Facades\Auth;

final class LoginUserAction
{
    public function __invoke(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            throw new LogicException(__('auth.failed'),404);
        }

        $user = Auth::user();

        if ((new VerifiedEmailSpecification)->isAllowed($user)) {
            throw new LogicException(__('auth.verify_email'),422);
        }

        if (!(new ActiveAccountSpecification)->isAllowed($user)) {

            throw new LogicException(__('exceptions.is_not_active_account'),422);
        }

        $user['token'] = $user->createToken('userAccessToken')->plainTextToken;

        return $user;
    }
}
