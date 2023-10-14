<?php

namespace Domains\Supports\Notifications;

use App\Models\Author;
use App\Models\Comment;
use App\Models\Like;
use Domains\Supports\Enums\UserEnum;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class LikePostNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Like $like)
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
            'type' => 'POST',
            'title_ar' => __('notifications.like_post.title', [], 'ar'),
            'title_en' => __('notifications.like_post.title', [], 'en'),
            'body_ar' => __('notifications.like_post.body', ['name' => $this->like->userable->name], 'ar'),
            'body_en' => __('notifications.like_post.body', ['name' => $this->like->userable->name], 'en'),
            'id' => $this->like->post->id,
        ];
    }
}
