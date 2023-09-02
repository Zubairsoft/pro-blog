<?php

namespace App\Policies;

use App\Models\ReplyComment;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class ReplyCommentPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(ReplyComment $replyComment): bool
    {
        $user = Auth::user();

        return $user->id === $replyComment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(User $user, ReplyComment $replyComment): bool
    {
        $user = Auth::user();

        return $user->id === $replyComment->user_id;
    }
}
