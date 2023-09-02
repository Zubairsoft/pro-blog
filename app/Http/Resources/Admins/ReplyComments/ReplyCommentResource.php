<?php

namespace App\Http\Resources\Admins\ReplyComments;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReplyCommentResource extends JsonResource
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
            'reply' => $this->reply,
            'is_seen' => $this->is_seen,
        ];
    }
}
