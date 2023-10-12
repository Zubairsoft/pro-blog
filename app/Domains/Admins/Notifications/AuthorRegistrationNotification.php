<?php

namespace Domains\Admins\Notifications;

use App\Models\Author;
use Domains\Supports\Enums\UserEnum;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class AuthorRegistrationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Author $author)
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
    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => UserEnum::getKey(UserEnum::AUTHOR),
            'title_ar' => __('notifications.register_author.title', [], 'ar'),
            'title_en' => __('notifications.register_author.title', [], 'en'),
            'body_ar' => __('notifications.register_author.title', ['name' => $this->author->name], 'ar'),
            'body_en' => __('notifications.register_author.title', ['name' => $this->author->name], 'en'),
            'id' => $this->author->id,
        ];
    }
}
