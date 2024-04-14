<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'phone' => $this->phone,
            'status' => $this->status,
            'location' => [
                'id' => $this->location->id,
                'neighborhood' => $this->location->neighborhood,
                'link' => $this->location->link,
            ]
        ];
    }
}
