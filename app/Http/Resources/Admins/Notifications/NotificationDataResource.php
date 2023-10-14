<?php

namespace App\Http\Resources\Admins\Notifications;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => translateNotificationTitle($this->data),
            'body' => translateNotificationBody($this->data)
        ];
    }
}
