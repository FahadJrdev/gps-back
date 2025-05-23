<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'alias' => $this->alias,
            'type' => $this->type,
            'license_plate' => $this->license_plate,
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'color' => $this->color,
            'registration_date' => $this->registration_date,
            'system_type' => $this->system_type,
            'status' => $this->status,
            'maintenanceHistories' => MaintenanceHistoryCollection::make($this->whenLoaded('maintenanceHistories')),
            'gpsDevice' => GpsDeviceResource::make($this->whenLoaded('gpsDevice')),
        ];
    }
}
