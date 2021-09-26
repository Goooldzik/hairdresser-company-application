<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HairdresserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,png'
        ];
    }
}
