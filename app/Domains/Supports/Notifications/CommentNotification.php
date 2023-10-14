<?php

namespace Domains\Supports\Notifications;

use App\Models\Author;
use App\Models\Comment;
use Domains\Supports\Enums\UserEnum;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Comment $comment)
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
            'type' => 'COMMENT',
            'title_ar' => __('notifications.new_comment.title', [], 'ar'),
            'title_en' => __('notifications.new_comment.title', [], 'en'),
            'body_ar' => __('notifications.new_comment.body', ['name' => $this->comment->userable->name], 'ar'),
            'body_en' => __('notifications.new_comment.body', ['name' => $this->comment->userable->name], 'en'),
            'id' => $this->comment->id,
        ];
    }
}
