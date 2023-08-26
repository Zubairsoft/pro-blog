<?php

namespace App\Http\Resources\Authors\Bookmarks;

use App\Http\Resources\Authors\Posts\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookmarkResource extends JsonResource
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
            'posts' => PostResource::make($this->whenLoaded('post'))
        ];
    }
}
