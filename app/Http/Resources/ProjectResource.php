<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'name' => $this->name,
            'skill' => new SkillResource($this->whenLoaded('skill')),
            'image' => $this->image ? asset('/public/storage/'. $this->image) : NULL,
            'project_url' => $this->project_url,
        ];
    }
}
