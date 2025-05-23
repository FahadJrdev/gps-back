<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleUpdateRequest extends FormRequest
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
            'customer_id' => ['required', 'integer', 'exists:customers,id'],
            'alias' => ['nullable', 'string'],
            'type' => ['required', 'string'],
            'license_plate' => ['required', 'string', 'unique:vehicles,license_plate'],
            'make' => ['required', 'string'],
            'model' => ['required', 'string'],
            'year' => ['required', 'integer'],
            'color' => ['required', 'string'],
            'registration_date' => ['required', 'date'],
            'system_type' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
        ];
    }
}
