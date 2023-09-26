<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use App\Models\Comment;
use App\Models\Post;
use App\Models\ReplyComment;
use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;
use App\Policies\ReplyCommentPolicy;
use Domains\Supports\Enums\RoleEnum;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        Comment::class => CommentPolicy::class,
        ReplyComment::class => ReplyCommentPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function () {

            $user = getAuthenticatedUser();

            if ($user->hasRole(RoleEnum::SUPER_ADMIN)) {
                return true;
            }
        });
    }
}
