<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeatherResultRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'city' => 'sometimes|required|string|max:255',
            'region' => 'sometimes|required|string|max:255',
            'country' => 'sometimes|required|string|max:255',
            'localtime' => 'sometimes|required|string|max:255',
            'condition_text' => 'sometimes|required|string|max:255',
            'condition_icon' => 'sometimes|required|string|max:255',
        ];
    }
}
