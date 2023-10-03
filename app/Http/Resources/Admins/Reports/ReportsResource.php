<?php

namespace App\Http\Resources\Admins\Reports;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportsResource extends JsonResource
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
            'report_type' => $this->report_type,
            'status' => $this->status->description,
        ];
    }
}
