<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\OtpActivation;
use App\Models\Report;
use App\Models\ResetPassword;
use App\Observers\CommentObserver;
use App\Observers\LikeObserver;
use App\Observers\OtpActivationObserver;
use App\Observers\ReportObserver;
use App\Observers\ResetPasswordObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $observers = [
        Report::class => ReportObserver::class,
        Like::class => LikeObserver::class,
        Comment::class => CommentObserver::class,
        OtpActivation::class => OtpActivationObserver::class,
        ResetPassword::class => ResetPasswordObserver::class
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
