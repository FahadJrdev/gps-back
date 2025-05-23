<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceHistoryStoreRequest extends FormRequest
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
            'technician_id' => ['required', 'integer', 'exists:technicians,id'],
            'service_type' => ['required', 'in:installation,uninstallation,maintenance,inspection'],
            'scheduled_date' => ['required', 'date'],
            'completion_date' => ['nullable', 'date'],
            'observations' => ['required', 'string'],
            'status' => ['required', 'in:scheduled,in_progress,completed'],
            'kilometers' => ['nullable', 'integer'],
        ];
    }
}
