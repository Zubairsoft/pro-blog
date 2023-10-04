<?php

namespace App\Http\Resources\Users\Posts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
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
            'user' => UserResource::make($this->whenLoaded('userable')),
            'comment' => $this->comment,
            'replyComments' => ReplyCommentsResource::collection($this->whenLoaded('replyComments'))
        ];
    }
}
