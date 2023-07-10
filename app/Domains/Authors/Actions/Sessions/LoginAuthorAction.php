<?php

namespace Domains\Authors\Actions\Sessions;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Authors\Sessions\loginRequest;
use Domains\Authors\Specification\IsActiveSpecification;
use Domains\Authors\Specification\IsVerifiedEmailSpecification;
use Illuminate\Support\Facades\Auth;

class LoginAuthorAction
{
    public function __invoke(loginRequest $request)
    {
        Auth::shouldUse(config('auth.author-web-guard'));

        if (!Auth::attempt($request->validated())) {
            throw new LogicException(__('auth.verify_email'), 422);
        }

        $author = Auth::user();

        if (!(new IsVerifiedEmailSpecification)->isAllowed($author)) {
            throw new LogicException(__('auth.verify_email'), 422);
        }

        if (!(new IsActiveSpecification)->isAllowed($author)) {

            throw new LogicException(__('auth.not_activated_account'), 422);
        }

        $author['token'] = $author->createToken('authorAccessToken')->plainTextToken;

        return $author;
    }
}
