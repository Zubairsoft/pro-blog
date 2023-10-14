<?php

namespace App\Observers;

use App\Models\Author;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Report;
use Domains\Admins\Notifications\ReportAuthorNotification;
use Domains\Admins\Notifications\ReportCommentNotification;
use Domains\Admins\Notifications\ReportPostNotification;
use Domains\Admins\Notifications\ReportUserNotification;
use Domains\Supports\Helpers\SendNotification;

class ReportObserver
{
    /**
     * Handle the Report "created" event.
     */
    public function created(Report $report): void
    {
        match ($report->reportable_type) {
            Post::class => SendNotification::toAdmins(new ReportPostNotification($report)),
            Comment::class => SendNotification::toAdmins(new ReportCommentNotification($report)),
            Author::class => SendNotification::toAdmins(new ReportAuthorNotification($report)),
            default => SendNotification::toAdmins(new ReportUserNotification($report))
        };
    }
}
