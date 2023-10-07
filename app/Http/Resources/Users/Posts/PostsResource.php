<?php

namespace App\Http\Resources\Users\Posts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'poster' => $this->poster,
            'images' => $this->images,
            'is_bookmark'=>$this->is_bookmark,
            'is_like'=>$this->is_like,
            'comment_count'=>$this->comment_count,
            'like_count'=>$this->like_count,
            'tags' => $this->tags->pluck('name'),
            'author' => UserResource::make($this->whenLoaded('authorable')),
            'comments' => CommentsResource::collection($this->whenLoaded('comments')),
        ];
    }
}
