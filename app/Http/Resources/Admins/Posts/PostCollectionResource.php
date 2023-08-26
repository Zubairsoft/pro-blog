<?php

namespace App\Http\Resources\Admins\Posts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollectionResource extends ResourceCollection
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
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'description_ar' => $this->description_ar,
            'description_en' => $this->description_en,
            'is_publish_ar' => $this->is_publish_ar,
            'is_publish_en' => $this->is_publish_en,
            'status' => $this->status
        ];
    }
}
