<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'identification' => $this->identification,
            'user_id' => $this->user_id,
            'phone' => $this->phone,
            'vehicles' => VehicleCollection::make($this->whenLoaded('vehicles')),
        ];
    }
}
