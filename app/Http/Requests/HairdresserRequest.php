<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HairdresserRequest extends FormRequest
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
            'user_id' => 'required',
            'hairdresser_number' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'created_at' => 'required',
        ];
    }
}
