<?php

namespace App\Http\Resources\Project;

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
            'type' => $this->type,
            'contractor' => $this->contractor,
            'phase' => $this->phase,
            'status'=>$this->status,
            'location' => [
                'id' => $this->location?->id,
                'neighborhood' => $this->location?->neighborhood,
                'link' => $this->location?->link,
            ]
        ];
    }
}
