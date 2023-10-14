<?php

namespace Domains\Admins\Notifications;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class ReportAuthorNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Report $report)
    {
        $this->onQueue('notification');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(): array
    {
        return [
            'type' => 'REPORT',
            'title_ar' => __('notifications.report_author.title', [], 'ar'),
            'title_en' => __('notifications.report_author.title', [], 'en'),
            'body_ar' => __('notifications.report_author.body', ['name' => $this->report->writable->name], 'ar'),
            'body_en' => __('notifications.report_author.body', ['name' => $this->report->writable->name], 'en'),
            'id' => $this->report->id,
        ];
    }
}
