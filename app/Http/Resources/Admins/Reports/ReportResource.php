<?php

namespace App\Http\Resources\Admins\Reports;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'writer' => UserResource::make($this->whenLoaded('writable')),
            'reason' => $this->reason,
            'report' => $this->getReport($this->reportable),
            'status' => $this->status->description,
        ];
    }

    private function getReport($report)
    {
        return match ($this->reportable_type) {
            Author::class, Admin::class => UserResource::make($report),
            Post::class => PostResource::make($report),
            Comment::class => CommentResource::make($report),
        };
    }
}
