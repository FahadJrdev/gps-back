<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'subscription_id' => $this->subscription_id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'full_name' => $this->name . ($this->last_name ? ' ' . $this->last_name : ''),
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'registration_date' => $this->registration_date,
            'termination_date' => $this->termination_date,
            'role' => $this->role,
            'apple_id' => $this->apple_id,
            'last_login' => $this->last_login,
            'status' => $this->status,
            'profile_image' => $this->profile_image 
                ? url(Storage::disk('direct')->url($this->profile_image))
                : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}