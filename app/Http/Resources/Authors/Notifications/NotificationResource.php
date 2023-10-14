<?php

namespace App\Http\Resources\Authors\Notifications;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'unreadNotificationsCount'=>$this->unread_notifications_count,
            'notifications'=>NotificationDataResource::collection($this->notifications)
            
        ];
    }
}
