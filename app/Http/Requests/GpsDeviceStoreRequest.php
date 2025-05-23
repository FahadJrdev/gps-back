<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GpsDeviceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'vehicle_id' => ['required', 'integer', 'exists:vehicles,id'],
            'imei' => ['required', 'string', 'unique:gps_devices,imei'],
            'device_type' => ['required', 'string'],
            'manufacturer' => ['required', 'string'],
            'model' => ['required', 'string'],
            'firmware_version' => ['required', 'string'],
            'installation_date' => ['nullable', 'date'],
            'status' => ['required', 'in:active,inactive,maintenance'],
        ];
    }
}
