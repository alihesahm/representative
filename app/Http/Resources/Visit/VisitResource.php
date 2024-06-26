<?php

namespace App\Http\Resources\Visit;

use App\Http\Resources\Client\ClientResource;
use App\Http\Resources\Location\LocationResource;
use App\Http\Resources\Project\ProjectResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitResource extends JsonResource
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
            'purpose' => $this->purpose,
            'impression' => $this->impression,
            'next_action' => $this->next_action,
            'neighborhood' => $this->neighborhood,
            'link' => $this->link,
            'project' => ProjectResource::make($this->project),
            'client' => ClientResource::make($this->client),
            'project_location' => LocationResource::make($this->projectLocation),
            'clinet_location' => LocationResource::make($this->clientLocation),
        ];
    }
}
