<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'vehicle_id' => $this->vehicle_id,
            'technician_id' => $this->technician_id,
            'service_type' => $this->service_type,
            'scheduled_date' => $this->scheduled_date,
            'completion_date' => $this->completion_date,
            'observations' => $this->observations,
            'status' => $this->status,
            'kilometers' => $this->kilometers,
        ];
    }
}
